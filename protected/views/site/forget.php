
<?php
if (Yii::app()->user->hasFlash('errorForgot')):
    echo "<div style='color:red'>" . Yii::app()->user->getFlash('errorForgot') . "</div>";
endif;
?><br><div class="row clearfix">
    <div class="col-md-4 column">
    </div>
    <div class="col-md-4 column">
        <div class="form">
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'login-form',
                'enableClientValidation' => true,
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                ),
            ));
            ?>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Forgot Password</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'email') . "*"; ?>
                        <?php echo $form->textField($model, 'email',array('class'=>'form-control')); ?>
                        <span style="color:red"><?php echo $form->error($model, 'email'); ?></span>
                    </div>
                    <div class="form-group">
                        <?php echo CHtml::submitButton('Reset Password',array('class'=>'btn btn-primary')); ?>
                        <br>
                        <?php
                        echo TbHtml::pager(array(
                            array('label' => 'Back', 'url' => '../site/index'),
                        ));
                        ?>

                    </div>
                </div>
            </div>
        </div>
<?php $this->endWidget(); ?>
    </div>
</div>