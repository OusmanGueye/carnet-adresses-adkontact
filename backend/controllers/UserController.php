<?php

namespace backend\controllers;

use backend\enum\Permissions;
use common\models\AuthItem;
use common\models\RoleForm;
use common\models\User;
use frontend\models\SignupForm;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\rbac\Permission;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use function Psy\debug;

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
                            'actions' => ['index', 'liste-role', 'manage-permissions', 'create-role', 'assign-permissions', 'assign-role', 'view'],
                            'allow' => true,
                            'roles' => [Permissions::MANAGE_USER],
                        ],
                        [
                            'actions' => ['create'],
                            'allow' => true,
                            'roles' => [Permissions::CREATE_USER],
                        ],
                        [
                            'actions' => ['update'],
                            'allow' => true,
                            'roles' => [Permissions::UPDATE_USER],
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

//    public function actionAssignRole($id)
//    {
//        $model = $this->findModel($id);
//        $auth = Yii::$app->authManager;
//
//        if (Yii::$app->request->isPost) {
//            $roles = Yii::$app->request->post('roles', []);
//            $permissions = Yii::$app->request->post('permissions', []);
//
//            // Clear existing roles and permissions
//            $auth->revokeAll($model->id);
//
//            // Assign new roles
//            foreach ($roles as $roleName) {
//                $role = $auth->getRole($roleName); // Correction ici pour obtenir le rôle dynamique
//                if ($role) {
//                    $auth->assign($role, $model->id);
//                }
//            }
//
//            // Assign new permissions
//            foreach ($permissions as $permissionName) {
//                $permission = $auth->getPermission($permissionName);
//                if ($permission) {
//                    $auth->assign($permission, $model->id);
//                }
//            }
//
//            return $this->redirect(['index']);
//        }
//
//        $allRoles = $auth->getRoles();
//        $allPermissions = $auth->getPermissions();
//
//        // Récupérer les rôles et permissions actuels de l'utilisateur
//        $userRoles = array_keys($auth->getRolesByUser($model->id));
//        $userPermissions = array_keys($auth->getPermissionsByUser($model->id));
//
//        return $this->renderAjax('assign-role', [
//            'model' => $model,
//            'allRoles' => $allRoles,
//            'allPermissions' => $allPermissions,
//            'userRoles' => $userRoles,
//            'userPermissions' => $userPermissions,
//        ]);
//    }

    public function actionCreateRole()
    {
        $auth = Yii::$app->authManager;
        $model = new RoleForm(); // Un formulaire pour gérer l'entrée des données

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $role = $auth->createRole($model->name);
            $role->description = $model->description;
            if ($auth->add($role)) {
                Yii::$app->session->setFlash('success', 'Le rôle a été créé avec succès.');
                return $this->redirect(['index']); // Redirige vers l'index ou une autre page appropriée
            } else {
                Yii::$app->session->setFlash('error', 'Erreur lors de la création du rôle.');
            }
        }

        return $this->render('create-role', [
            'model' => $model,
        ]);
    }


    public function actionListeRole()
    {
        $auth = Yii::$app->authManager;
        $allRoles = $auth->getRoles();
        $roles = array_filter($allRoles, function($role) {
            $authItem = AuthItem::findOne(['name' => $role->name, 'type' => 1]); // type 1 pour les rôles
            return $authItem === null || !$authItem->is_deleted;
        });

        return $this->render('liste-role', [
            'roles' => $roles,
        ]);
    }

    public function actionDeleteRole($name)
    {
        $auth = Yii::$app->authManager;
        $role = $auth->getRole($name);

        if ($role) {
            $authItem = AuthItem::findOne(['name' => $name, 'type' => 1]); // type 1 pour les rôles
            if ($authItem) {
                $authItem->is_deleted = true;
                if ($authItem->save()) {
                    Yii::$app->session->setFlash('success', 'Le rôle a été marqué comme supprimé avec succès.');
                } else {
                    Yii::$app->session->setFlash('error', 'Erreur lors de la suppression du rôle.');
                }
            } else {
                Yii::$app->session->setFlash('error', 'Rôle introuvable.');
            }
        } else {
            Yii::$app->session->setFlash('error', 'Rôle introuvable.');
        }

        return $this->redirect(['liste-role']);
    }

    public function actionUpdateRole($name)
    {
        $auth = Yii::$app->authManager;
        $role = $auth->getRole($name);
        $model = new RoleForm([
            'name' => $role->name,
            'description' => $role->description,
        ]);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $role->description = $model->description;
            if ($auth->update($role->name, $role)) {
                Yii::$app->session->setFlash('success', 'Le rôle a été mis à jour avec succès.');
                return $this->redirect(['index']);
            } else {
                Yii::$app->session->setFlash('error', 'Erreur lors de la mise à jour du rôle.');
            }
        }

        return $this->render('update-role', [
            'model' => $model,
            'role' => $role,
        ]);
    }


    public function actionManagePermissions($role)
    {
        // Récupérer le nom du rôle à partir de la requête GET
        $roleName = Yii::$app->request->get('role');

        // Récupérer le rôle correspondant
        $auth = Yii::$app->authManager;
        $role = $auth->getRole($roleName);

        // Vérifier si le rôle existe
        if ($role !== null) {
            // Récupérer toutes les permissions disponibles
            $allPermissions = $auth->getPermissions();
            // Récupérer les permissions actuellement associées au rôle
            $rolePermissions = $auth->getPermissionsByRole($roleName);

            // Rendre la vue et passer les données nécessaires
            return $this->renderAjax('_permissions_dialog', [
                'allPermissions' => $allPermissions,
                'rolePermissions' => $rolePermissions,
                'roleName' => $role->name,
            ]);
        } else {
            // Rediriger vers une page d'erreur ou afficher un message d'erreur
            Yii::$app->session->setFlash('error', 'Le rôle sélectionné n\'existe pas.');
            return $this->redirect(['index']); // Remplacez 'index' par l'action appropriée
        }
    }



    public function actionAssignPermissions()
    {
        $request = Yii::$app->request;
        $roleName = $request->post('role');
        $permissions = $request->post('permissions', []);

        // Récupérer le rôle correspondant
        $auth = Yii::$app->authManager;
        $role = $auth->getRole($roleName);

        if ($role) {
            // Supprimer les anciennes permissions du rôle
            $auth->removeChildren($role);

            // Associer les nouvelles permissions au rôle
            foreach ($permissions as $permissionName) {
                $permission = $auth->getPermission($permissionName);
                if ($permission) {
                    $auth->addChild($role, $permission);
                }
            }

            // Redirection ou affichage d'un message de succès
            Yii::$app->session->setFlash('success', 'Les permissions ont été mises à jour avec succès.');
        } else {
            Yii::$app->session->setFlash('error', 'Le rôle n\'existe pas.');
        }

        return $this->redirect(['index']);
    }



    public function actionAssignRole($id)
    {
        $auth = Yii::$app->authManager;
        $user = User::findOne($id);

        if (!$user) {
            throw new \yii\web\NotFoundHttpException("User not found.");
        }

        $allRoles = $auth->getRoles();
        $userRoles = $auth->getRolesByUser($id);

        if (Yii::$app->request->isPost) {
            $roles = Yii::$app->request->post('roles', []);
            $auth->revokeAll($id);

            foreach ($roles as $roleName) {
                $role = $auth->getRole($roleName);
                if ($role) {
                    $auth->assign($role, $id);
                }
            }

            Yii::$app->session->setFlash('success', 'Roles have been updated.');
            return $this->redirect(['index']);
        }

        return $this->renderAjax('_assign_role_form', [
            'user' => $user,
            'allRoles' => $allRoles,
            'userRoles' => $userRoles,
        ]);
    }






}
