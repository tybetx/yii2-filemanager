<?php

namespace pendalf89\filemanager\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use pendalf89\filemanager\models\Mediafile;

/**
 * MediafileSearch represents the model behind the search form about `pendalf89\filemanager\Mediafile`.
 */
class MediafileSearch extends Mediafile
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['filename', 'type', 'url', 'alt', 'description'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Mediafile::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'filename', $this->filename])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'alt', $this->alt])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
