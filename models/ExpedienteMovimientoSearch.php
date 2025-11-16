<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ExpedienteMovimiento;

/**
 * ExpedienteMovimientoSearch represents the model behind the search form of `app\models\ExpedienteMovimiento`.
 */
class ExpedienteMovimientoSearch extends ExpedienteMovimiento
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_expediente_movimiento', 'texto', 'id_tipo_movimiento', 'json_data'], 'safe'],
            [['para_digesto'], 'boolean'],
        ];
    }

    /**
     * {@inheritdoc}
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
     * @param string|null $formName Form name to be used into `->load()` method.
     *
     * @return ActiveDataProvider
     */
    public function search($params, $formName = null)
    {
        $query = ExpedienteMovimiento::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params, $formName);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'para_digesto' => $this->para_digesto,
        ]);

        $query->andFilterWhere(['ilike', 'id_expediente_movimiento', $this->id_expediente_movimiento])
            ->andFilterWhere(['ilike', 'texto', $this->texto])
            ->andFilterWhere(['ilike', 'id_tipo_movimiento', $this->id_tipo_movimiento])
            ->andFilterWhere(['ilike', 'json_data', $this->json_data]);

        return $dataProvider;
    }
}
