<?php
$this->breadcrumbs=array(
		'Users'=>array('index'),
		'Manage',
);

$this->menu=array(
		array('label'=>'List User', 'url'=>array('index')),
		array('label'=>'Create User', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
		$('.search-button').click(function(){
		$('.search-form').toggle();
		return false;
});
		$('.search-form form').submit(function(){
		$.fn.yiiGridView.update('user-grid', {
		data: $(this).serialize()
});
		return false;
});
		");
?>

<h1>Call Center查看用户信息</h1>

<?php echo CHtml::link('高级搜索','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display: none">
	<?php $this->renderPartial('//user/_search',array(
			'model'=>$model,
	)); ?>
</div>
<!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'user-grid',
		'dataProvider'=>$model->search(),
		'filter'=>$model,
		'columns'=>array(
				//'id',
				//'has_code',

				'email',
				'mobile',
				'full_name',
				//'password',
				'has_reged'=>array(
						'name'=>'has_reged',
						'value'=>function($data)
						{
							return $data->has_reged==1?'已注册':'未注册';
						},

						),
						'payment.has_paid'=>array(
								'name'=>'payment.has_paid',
								'type'=>'raw',
								'value'=>function($data)
								{
									if(count($data->payment)>0){
										return $data->payment->has_paid==0?'未收款':'已收款';
									}
								},
						),
						'payment.has_sendinvoice'=>array(
								'name'=>'payment.has_sendinvoice',
								'type'=>'raw',
								'value'=>function($data)
								{
									if(count($data->payment)>0){
										return $data->payment->has_sendinvoice==0?'未开发票':'已开发票';
									}
								},
						),
										/*
										 'relation_with_cisco',
										'full_name',
										'job_title',
										'department',
										'working_phone_dis',
										'working_phone',
										'mobile',
										'province',
										'city',
										'ec_name',
										'ec_relationship',
										'ec_mobile',
										'created_at',
										'created_by',

										'updated_by',
										*/
										),
										)
										); ?>
