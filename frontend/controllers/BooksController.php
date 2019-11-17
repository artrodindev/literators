<?php

namespace frontend\controllers;

use frontend\models\book\BookDescription;
use Yii;
use frontend\models\book\Book;
use frontend\models\book\BookSearch;
use yii\db\Query;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BooksController implements the CRUD actions for Book model.
 */
class BooksController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Book models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BookSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Book model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Book model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $book = new Book();
        $book_description = new BookDescription();

        if ($book->load(Yii::$app->request->post()) &&
            $book_description->load(Yii::$app->request->post()) &&
            $book->save()
        ) {

            $book_description->book_id = $book->id;
            $book_description->save();

            return $this->redirect(['view', 'id' => $book->id]);
        }

        return $this->render('create', [
            'book' => $book,
            'book_description' => $book_description,
        ]);
    }

    /**
     * Updates an existing Book model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $book = $this->findModel($id);
        $book_description = BookDescription::find()->where(['book_id' => $id])->one();


        if ($book->load(Yii::$app->request->post()) &&
            $book_description->load(Yii::$app->request->post()) &&
            $book->save() &&
            $book_description->save()
        ) {
            return $this->redirect(['view', 'id' => $book->id]);
        }

        return $this->render('update', [
            'book' => $book,
        ]);
    }

    /**
     * Deletes an existing Book model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * @param string $userQuery
     * @return array|false|string
     */

    public function actionSearch(string $userQuery)
    {
         $query = new Query();

         $output = $query->select('id, book_name')
             ->from('tbl_books')
             ->where('book_name LIKE "%'. $userQuery .'%"')
             ->orderBy('book_name')
            ->all();

         $output = json_encode($output);

         return $output;
    }

    /**
     * Finds the Book model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Book the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Book::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
