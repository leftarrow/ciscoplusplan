<?php

/**
 * This is the model class for table "surveys".
 *
 * The followings are the available columns in table 'surveys':
 * @property string $id
 * @property string $user_id
 * @property integer $q1
 * @property integer $q2
 * @property integer $q3
 * @property integer $q4
 * @property string $q5
 * @property string $q6
 * @property integer $q7
 * @property integer $q8
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 */
class Survey extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Survey the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'surveys';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('q1, q2, q3, q4, q7, q8, created_by, updated_by', 'numerical', 'integerOnly' => true),
            array('user_id', 'length', 'max' => 10),
            array('q5, q6', 'length', 'max' => 255),
            array('created_at, updated_at', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, user_id, q1, q2, q3, q4, q5, q6, q7, q8, created_at, created_by, updated_at, updated_by', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'survey' => array(self::BELONGS_TO, 'User', 'user_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'user_id' => 'User',
            'q1' => '1.贵单位的网络建设的投资方向是?1',
            'q2' => '2.贵单位在什么时间范围内将有网络扩张、升级或安全等方面的网络项目？',
            'q3' => '3.贵单位如果计划进行网络扩张、升级或安全等网络项目，预算大概在什么范围（RMB）：',
            'q4' => '4.贵公司的PC数量是',
            'q5' => '5.贵公司所属行业',
            'q6' => '6.您在信息化管理和网络建设中技术职责是什么?(多选)',
            'q7' => '7.我愿意思科公司代表与我联系.',
            'q8' => '8.我愿意通过电子邮件，接收来自思科的产品和资讯信息.',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id, true);
        $criteria->compare('user_id', $this->user_id, true);
        $criteria->compare('q1', $this->q1);
        $criteria->compare('q2', $this->q2);
        $criteria->compare('q3', $this->q3);
        $criteria->compare('q4', $this->q4);
        $criteria->compare('q5', $this->q5, true);
        $criteria->compare('q6', $this->q6, true);
        $criteria->compare('q7', $this->q7);
        $criteria->compare('q8', $this->q8);
        $criteria->compare('created_at', $this->created_at, true);
        $criteria->compare('created_by', $this->created_by);
        $criteria->compare('updated_at', $this->updated_at, true);
        $criteria->compare('updated_by', $this->updated_by);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'params' => array(),
            ),
        ));
    }

    public function getQ1Text($id) {
        $Q11Options = $this->getQ11Options();
        return isset($Q11Options[$id]) ?
                $Q11Options[$id] :
                "unknown type ({$id})";
    }

    public function getQ1Options() {
        return array(
            '' => 'Select One',
            0 => 'LAN',
            1 => 'WAN',
            2 => 'MAN',
            3 => 'Wireless Solution',
            4 => 'Optical Fiber Communications',
            5 => 'Unified Communications',
            6 => 'IP Langage',
            7 => 'Video Solutions',
            8 => 'DSL Access Solutions',
            9 => 'Wired Access Plan',
            10 => 'Data Center',
            11 => 'Memory Networks',
            12 => 'Virtual Private Network And Security Solutions',
            13 => 'Unsure',
            14 => 'Other',
        );
    }

    public function getQ11Options() {
        return array(
            '' => "请选择一个",
            0 => '局域网(LAN)',
            1 => '广域网(WAN)',
            2 => '城域网(MAN)',
            3 => '无线解决方案',
            4 => '光纤通信',
            5 => '统一通信',
            6 => 'IP 语音',
            7 => '视频解决方案',
            8 => 'DSL接入方案',
            9 => '有线接入方案',
            10 => '数据中心',
            11 => '存储网络',
            12 => '虚拟专网及安全解决方案',
            13 => '不确定',
            14 => '其它',
        );
    }

    public function getQ2Text($id) {
        $Q22Options = $this->getQ22Options();
        return isset($Q22Options[$id]) ?
                $Q22Options[$id] :
                "unknown type ({$id})";
    }
    public function getQ2Options() {
        return array(
            '' => 'Select One',
            0 => 'Now - 3 Months',
            1 => '4 - 6 Months',
            2 => '7 - 12 Months',
            3 => 'Over 12 Months',
            4 => 'No Plan To Purcharse',
            5 => 'Unsure',
        );
    }

    public function getQ22Options() {
        return array(
            '' => "请选择一个",
            0 => '三个月内',
            1 => '四至六个月',
            2 => '七至十二个月',
            3 => '十二个月以上',
            4 => '没有计划',
            5 => '不确定',
        );
    }

    public function getQ3Text($id) {
        $Q33Options = $this->getQ33Options();
        return isset($Q33Options[$id]) ?
                $Q33Options[$id] :
                "unknown type ({$id})";
    }
    public function getQ3Options() {
        return array(
            '' => 'Select One',
            0 => '0-10K',
            1 => '10K-50K',
            2 => '50K-150K',
            3 => '150K-250K',
            4 => '250K-500K',
            5 => '500K-1M',
            6 => '1M-2M',
            7 => '2M-5M',
            8 => '5M-10M',
            9 => 'Above 10M',
            10 => 'Budget Amount Not Fixed',
            11 => 'No Budget Available',
            12 => 'Don\'t Know/Not Responsible',
        );
    }

    public function getQ33Options() {
        return array(
            '' => "请选择一个",
            0 => '0-1万',
            1 => '1-5万',
            2 => '5-15万',
            3 => '15-25万',
            4 => '25-50万',
            5 => '50-100万',
            6 => '100-200万',
            7 => '200-500万',
            8 => '500-1000万',
            9 => '1000万以上',
            10 => '预算不确定',
            11 => '没有预算',
            12 => '不知道/不负责',
        );
    }

    public function getQ4Options() {
        return array(
            '' => "Select One",
            0 => '1-4',
            1 => '5-19',
            2 => '20-49',
            3 => '50-99',
            4 => '100-249',
            5 => '250-499',
            6 => '500-999',
            7 => '1000-1999',
            8 => '2000-4999',
            9 => '5000-9999',
            10 => '10000+',
            11 => 'None',
        );
    }
public function getQ4Text($id) {
        $Q44Options = $this->getQ44Options();
        return isset($Q44Options[$id]) ?
                $Q44Options[$id] :
                "unknown type ({$id})";
    }
    public function getQ44Options() {
        return array(
            '' => "请选择一个",
            0 => '1-4台',
            1 => '5-19台',
            2 => '20-49台',
            3 => '50-99台',
            4 => '100-249台',
            5 => '250-499台',
            6 => '500-999台',
            7 => '1000-1999台',
            8 => '2000-4999台',
            9 => '5000-9999台',
            10 => '10000台以上',
            11 => '无',
        );
    }

    public function getQ6Text($id) {
        $Q66Options = $this->getQ66Options();
        return isset($Q66Options[$id]) ?
                $Q66Options[$id] :
                "unknown type ({$id})";
    }
    public function getQ66Options() {
        return array(
            1 => 'IP通讯',
            2 => 'IT应用',
            3 => '光纤网络',
            4 => '安全 - 应用安全',
            5 => '安全 - 政策安全等级',
            6 => '安全 - 网络安全',
            7 => '数据中心 - 基础架构',
            8 => '数据中心 - 存储',
            9 => '数据中心 - 服务器',
            10 => '数据中心 - 应用网络',
            11 => '无线',
            12 => '系统维护',
            13 => '网络维护',
            14 => '网络运营',
            15 => '视频系统',
            16 => '语音系统',
            17 => '语音 - 呼叫中心',
        );
    }

    public function getQ6Options() {
        return array(
            801 => Yii::t('default', 'Data Center - Application Networking'),
            802 => Yii::t('default', 'Data Center - Infrastructure'),
            803 => Yii::t('default', 'Data Center - Servers'),
            804 => Yii::t('default', 'Data Center - Storage'),
            807 => Yii::t('default', 'IT Applications'),
            808 => Yii::t('default', 'Network Operation'),
            813 => Yii::t('default', 'Security - Application Security'),
            814 => Yii::t('default', 'Security - Network Security'),
            815 => Yii::t('default', 'Security - Policy Security Level'),
            818 => Yii::t('default', 'Video Systems'),
            819 => Yii::t('default', 'Voice - Cisco Unified Contact Center'),
            820 => Yii::t('default', 'Voice Systems'),
            821 => Yii::t('default', 'Wireless'),
        );
    }

    public function getQ5Text($id) {
        $Q55Options = $this->getQ55Options();
        return isset($Q55Options[$id]) ?
                $Q55Options[$id] :
                "unknown type ({$id})";
    }
    public function getQ55Options() {
        return array(
            '' => "请选择一个",
            1 => '航天航空/国防',
            2 => '汽车',
            3 => '银行',
            4 => '石油化工',
            5 => '电脑软/硬件供应商',
            6 => '消费品',
            7 => '教育',
            8 => '电子',
            9 => '金融服务',
            10 => '食品，饮料，烟草',
            11 => '政府机关',
            12 => '医疗',
            13 => '酒店及娱乐服务',
            14 => '保险',
            15 => '公检法',
            16 => '制造业',
            17 => '媒体-印刷/广播',
            18 => '生物和制药',
            19 => '律师，财务，咨询类等专业服务',
            20 => '零售业',
            21 => '房地产',
            22 => '电信运营商，ISP，ICP，ASP，有线电视',
            23 => '交通运输',
            24 => '能源',
            25 => '批发/分销',
        );
    }

    public function getQ5Options() {
        return array(
            '' => Yii::t('default', 'Select one'),
            801 => Yii::t('default', 'Aerospace & Defence'),
            802 => Yii::t('default', 'Automotive'),
            803 => Yii::t('default', 'Banking'),
            804 => Yii::t('default', 'Chemical & Petroleum'),
            805 => Yii::t('default', 'Computer Software & Services'),
            806 => Yii::t('default', 'Consumer Products'),
            807 => Yii::t('default', 'Education'),
            808 => Yii::t('default', 'Electronics'),
            809 => Yii::t('default', 'Financial Services'),
            810 => Yii::t('default', 'Food, Beverage & Tobacco'),
            811 => Yii::t('default', 'Government'),
            812 => Yii::t('default', 'Healthcare'),
            813 => Yii::t('default', 'Hotels & Leisure'),
            814 => Yii::t('default', 'Insurance'),
            815 => Yii::t('default', 'Legal'),
            816 => Yii::t('default', 'Manufacturing'),
            817 => Yii::t('default', 'Media - Print - Broadcast'),
            818 => Yii::t('default', 'Pharmaceutical & Biotechnology'),
            819 => Yii::t('default', 'Legal, Finance & Consulting Services'),
            820 => Yii::t('default', 'Retail'),
            821 => Yii::t('default', 'Property & Construction'),
            822 => Yii::t('default', 'Telecommunications'),
            823 => Yii::t('default', 'Transportation'),
            824 => Yii::t('default', 'Energy'),
            825 => Yii::t('default', 'Wholesale/Distribution'),
        );
    }

}