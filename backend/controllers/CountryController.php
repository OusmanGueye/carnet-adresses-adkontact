<?php

namespace backend\controllers;

use backend\enum\Permissions;
use common\models\Country;

use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\helpers\Console;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * CountryController implements the CRUD actions for Country model.
 */
class CountryController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [

                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
                'access' => [
                    'class' => AccessControl::className(),
                    'rules' => [
                        [
                            'actions' => ['index'],
                            'allow' => true,
                            'roles' => [Permissions::COUNTRY_READ],
                        ],
                        [
                            'actions' => ['create', 'ajax'],
                            'allow' => true,
                            'roles' => [Permissions::COUNTRY_CREATE],
                        ],
                        [
                            'actions' => ['view'],
                            'allow' => true,
                            'roles' => [Permissions::COUNTRY_READ],
                        ],
                        [
                            'actions' => ['update'],
                            'allow' => true,
                            'roles' => [Permissions::COUNTRY_UPDATE],
                        ],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Country models.
     *
     * @return string
     */
    public function actionIndex()
    {

        $dataProvider = new ActiveDataProvider([
            'query' => Country::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
            */
        ]);

        $model = new Country();

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }

    /**
     * Displays a single Country model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Country model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return array
     */
    public function actionCreate()
    {
        // Vérifiez si la demande est une requête AJAX
        if (!Yii::$app->request->isAjax) {
            throw new \yii\web\BadRequestHttpException('This action can only be accessed via AJAX.');
        }

        $model = new Country();

        if ($model->load(Yii::$app->request->post())) {

            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            if ($model->save()) {
                $newRow = $this->renderPartial('_countryRow', ['country' => $model]);
                return [
                    'success' => true,
                    'message' => 'Country successfully added.',
                    'newRow' => $newRow,
                ];
            } else {
                return [
                    'success' => false,
                    'message' => 'Failed to add country.',
                    'errors' => $model->errors,
                ];
            }
        }

        // Si la demande n'est pas AJAX ou si le chargement du modèle a échoué, retournez à l'action par défaut
        return $this->redirect(['index']);
    }

    public function actionAjax()
    {

        $model = new Country();
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                $newRow = $this->renderPartial('_countryRow', ['country' => $model]);
                return [
                    'data' => [
                        'success' => true,
                        'model' => $model,
                        'message' => 'Model has been saved.',
                        'newRow' => $newRow,
                    ],
                    'code' => 0,
                ];
            } else {
                return [
                    'data' => [
                        'success' => false,
                        'model' => null,
                        'message' => 'An error occured.',
                    ],
                    'code' => 1, // Some semantic codes that you know them for yourself
                ];
            }
        }else{
            throw new \yii\web\BadRequestHttpException('This action can only be accessed via AJAX.');
        }

    }

    public function actionAjaxUpdate()
    {
        $model = Country::findOne(Yii::$app->request->post('id'));
        //$model = $this->findModel($id);
        if (Yii::$app->request->isAjax && $model) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            $model->name = Yii::$app->request->post('name');

            if ($model->save()) {
                return [
                    'data' => [
                        'success' => true,
                        'id' => $model->id,
                        'name' => $model->name,
                        'message' => 'Model has been updated.',
                    ],
                    'code' => 0,
                ];
            } else {
                $errors = $model->getErrors();
                return [
                    'data' => [
                        'success' => false,
                        'model' => null,
                        'country' => Yii::$app->request->post(),
                        'message' => 'An error occurred.',
                        'errors' => $errors,
                    ],
                    'code' => 1,
                ];
            }
        } else {
            throw new \yii\web\BadRequestHttpException('This action can only be accessed via AJAX.');
        }
    }




    /**
     * Updates an existing Country model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('index', [
            'model' => $model,
        ]);
    }

    public function actionGetCountry($id)
    {
        // Vérifiez si la demande est une requête AJAX
        if (!Yii::$app->request->isAjax) {
            throw new \yii\web\BadRequestHttpException('This action can only be accessed via AJAX.');
        }

        Yii::$app->response->format = Response::FORMAT_JSON;

        $country = Country::findOne($id);
        if ($country !== null) {
            return [
                'data' => [
                    'success' => true,
                    'id' => $country->id,
                    'name' => $country->name,
                ],
            ];
        } else {
            return [
                'data' => [
                    'success' => false,
                    'message' => 'Country not found.',
                ],
            ];
        }
    }

    // delete  country whith ajax
    public function actionAjaxDelete($id)
    {
        // Vérifiez si la demande est une requête AJAX
        if (!Yii::$app->request->isAjax ) {
            throw new \yii\web\BadRequestHttpException('Cette action ne peut être accédée que via AJAX.');
        }

        Yii::$app->response->format = Response::FORMAT_JSON;

        $country = Country::findOne($id);
        if ($country !== null) {
            if ($country->delete()) {
                return [
                    'data' => [
                        'success' => true,
                        'message' => 'Le pays a été supprimé avec succès.',
                    ],
                ];
            } else {
                return [
                    'data' => [
                        'success' => false,
                        'message' => 'Échec de la suppression du pays.',
                    ],
                ];
            }
        } else {
            return [
                'data' => [
                    'success' => false,
                    'message' => 'Pays non trouvé.',
                ],
            ];
        }
    }

    /**
     * Deletes an existing Country model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Country model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Country the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Country::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
