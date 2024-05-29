<?php

namespace backend\controllers;

use common\models\User;
use frontend\models\SignupForm;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
                            'allow' => true,
                            'roles' => ['admin'],
                        ],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all User models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => User::find(),
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

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param int $id
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
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
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

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionAssignRole($id)
    {
        $model = $this->findModel($id);
        $auth = Yii::$app->authManager;

        if (Yii::$app->request->isPost) {
            $roles = Yii::$app->request->post('roles', []);
            $permissions = Yii::$app->request->post('permissions', []);

            // Clear existing roles and permissions
            $auth->revokeAll($model->id);

            // Assign new roles
            foreach ($roles as $roleName) {
                $role = $auth->getRole($roleName); // Correction ici pour obtenir le rôle dynamique
                if ($role) {
                    $auth->assign($role, $model->id);
                }
            }

            // Assign new permissions
            foreach ($permissions as $permissionName) {
                $permission = $auth->getPermission($permissionName);
                if ($permission) {
                    $auth->assign($permission, $model->id);
                }
            }

            return $this->redirect(['index']);
        }

        $allRoles = $auth->getRoles();
        $allPermissions = $auth->getPermissions();

        // Récupérer les rôles et permissions actuels de l'utilisateur
        $userRoles = array_keys($auth->getRolesByUser($model->id));
        $userPermissions = array_keys($auth->getPermissionsByUser($model->id));

        return $this->renderAjax('assign-role', [
            'model' => $model,
            'allRoles' => $allRoles,
            'allPermissions' => $allPermissions,
            'userRoles' => $userRoles,
            'userPermissions' => $userPermissions,
        ]);
    }




}
