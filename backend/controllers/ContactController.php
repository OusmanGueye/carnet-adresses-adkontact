<?php
namespace backend\controllers;

use common\models\Contact;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class ContactController extends Controller
{
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::class,
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
                'access' => [
                    'class' => AccessControl::class,
                    'rules' => [
                        [
                            'allow' => true,
                            'roles' => ['admin'],
                        ],
                    ],
                ],
            ]
        );
    }

    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Contact::find(),
        ]);

        $deletedDataProvider = new ActiveDataProvider([
            'query' => Contact::find()->where(['is_deleted' => true]),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'deletedDataProvider' => $deletedDataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new Contact();

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if ($model->delete()) {
            Yii::$app->session->setFlash('success', 'Contact has been deleted.');
        } else {
            Yii::$app->session->setFlash('error', 'Failed to delete contact.');
        }

        return $this->redirect(['index']);
    }

    public function actionRestore($id)
    {

        $contact = Contact::find()->where(['id' => $id, 'is_deleted' => 1])->one();

        if ($contact !== null) {
            if ($contact->restore()) {
                // Succès
                Yii::$app->session->setFlash('success', 'Contact has been restored.');
            } else {
                // Échec
                Yii::$app->session->setFlash('error', 'Failed to restore contact.');
            }
        } else {
            Yii::$app->session->setFlash('error', 'Error System.');
        }

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Contact::findOne(['id' => $id, 'is_deleted' => false])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
