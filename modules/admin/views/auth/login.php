<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class="login-box">
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'username', ['template' => "<div class=\"form-group has-feedback\">{input}<span class=\"glyphicon glyphicon-user form-control-feedback\"></span><div>{error}</div></div>"]) ?>
        <?= $form->field($model, 'password', ['template' => "<div class=\"form-group has-feedback\">{input}<span class=\"glyphicon glyphicon-envelope form-control-feedback\"></span><div>{error}</div></div>"]) ?>

        <div class="row">
            <div class="col-xs-8">
                <div class="checkbox icheck">
                    <?= $form->field($model, 'rememberMe')->checkbox(['template' => "{label} {input}"]) ?>
                </div>
            </div>
            <div class="col-xs-4">
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>