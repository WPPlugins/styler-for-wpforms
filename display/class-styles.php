<?php
$get_form_options = get_option( "sfwf_form_id_".$css_form_id );

if ( isset( $get_form_options['form-wrapper']['font'] ) ) {
    $font_name = $get_form_options['form-wrapper']['font'];
    $font_name= str_replace( ' ', '+', $font_name );
    if ( $font_name !== 'Default' ) {
        echo "<link href='https://fonts.googleapis.com/css?family=".$font_name."' rel='stylesheet' type='text/css'>";
    }
}
?>
<style type="text/css">
body #wpforms-<?php echo $css_form_id ?> {
<?php echo $main_class_object->swfw_get_saved_styles( $css_form_id, 'form-wrapper' );  ?>
<?php echo empty( $get_form_options['form-wrapper']['background-image'] )?'':'background-image:url("'. $get_form_options['form-wrapper']['background-image'].'");' ;  ?>
<?php
if ( !empty( $get_form_options['form-wrapper']['font'] ) ) {
    if ( $get_form_options['form-wrapper']['font'] == 'Default' ) {
        echo 'font-family:inherit;' ;
    }
    else {
        echo 'font-family:'. $get_form_options['form-wrapper']['font'].';' ;
    }
} ?>
}

body #wpforms-<?php echo $css_form_id ?> .wpforms-head-container {
    <?php echo $main_class_object->swfw_get_saved_styles( $css_form_id, 'form-header' );  ?>
    <?php
if ( empty( $get_form_options['form-header']['border-size'] ) ) {
    echo 'border-width: 0px;';
}
?>
}

body #wpforms-<?php echo $css_form_id ?> .wpforms-head-container .wpforms-title {
    <?php echo $main_class_object->swfw_get_saved_styles( $css_form_id, 'form-title' );  ?>
    }

body #wpforms-<?php echo $css_form_id ?> .wpforms-head-container .wpforms-description {
    <?php echo $main_class_object->swfw_get_saved_styles( $css_form_id, 'form-description' );  ?>
    display:block;
}

body #wpforms-<?php echo $css_form_id ?> .wpforms-submit-container .wpforms-submit {
    <?php echo $main_class_object->swfw_get_saved_styles( $css_form_id, 'submit-button' );  ?>
    <?php
if ( empty( $get_form_options['submit-button']['border-size'] ) ) {
    echo 'border-width: 0px;';
}
?>
}

body #wpforms-<?php echo $css_form_id ?> .wpforms-submit-container .wpforms-submit:hover {
    <?php echo isset($get_form_options['submit-button']['hover-color'])?'background-color:'. $get_form_options['submit-button']['hover-color'].';':''; ?>
    <?php echo isset($get_form_options['submit-button']['font-hover-color'])?'color:'. $get_form_options['submit-button']['font-hover-color'].';':''; ?>
   }




body #wpforms-<?php echo $css_form_id ?> .wpforms-submit-container {
    <?php echo empty( $get_form_options['submit-button']['button-align'] )?'':'text-align:'. $get_form_options['submit-button']['button-align'].';' ;  ?>
}

body #wpforms-<?php echo $css_form_id ?> .wpforms-form .wpforms-field input[type=text],
body #wpforms-<?php echo $css_form_id ?> .wpforms-form .wpforms-field input[type=email],
body #wpforms-<?php echo $css_form_id ?> .wpforms-form .wpforms-field input[type=tel],
body #wpforms-<?php echo $css_form_id ?> .wpforms-form .wpforms-field input[type=url],
body #wpforms-<?php echo $css_form_id ?> .wpforms-form .wpforms-field input[type=password]
body #wpforms-<?php echo $css_form_id ?> .wpforms-form .wpforms-field input[type=number]
{
 <?php echo $main_class_object->swfw_get_saved_styles( $css_form_id, 'text-fields' );  ?>
       <?php
if ( empty( $get_form_options['text-fields']['border-size'] ) ) {
    echo 'border-width: 1px;';
}
?>
}

body #wpforms-<?php echo $css_form_id ?> .wpforms-form .wpforms-field textarea {
    <?php echo $main_class_object->swfw_get_saved_styles( $css_form_id, 'paragraph-textarea' );  ?>
        <?php
if ( empty( $get_form_options['text-fields']['border-size'] ) ) {
    echo 'border-width: 1px;';
}
?>
    <?php echo empty( $get_form_options['text-fields']['background-color'] )?'':'background:'. $get_form_options['text-fields']['background-color'].';'; ?>
    <?php echo empty( $get_form_options['text-fields']['border-size'] )?'':'border-width:'. $get_form_options['text-fields']['border-size'].';'; ?>
    <?php echo empty( $get_form_options['text-fields']['border-color'] )?'':'border-color:'. $get_form_options['text-fields']['border-color'].';'; ?>
    <?php echo empty( $get_form_options['text-fields']['border-type'] )?'':'border-style:'. $get_form_options['text-fields']['border-type'].';'; ?>
    <?php echo empty( $get_form_options['text-fields']['font-size'] )?'':'font-size:'. $get_form_options['text-fields']['font-size'].';'; ?>
    <?php echo empty( $get_form_options['text-fields']['font-color'] )?'':'color:'. $get_form_options['text-fields']['font-color'].';'; ?>
    <?php
if ( !empty( $get_form_options['text-fields']['border-radius'] ) ) {
    echo 'border-radius:'.$get_form_options['text-fields']['border-radius'].$main_class_object->swfw_get_saved_styles($get_form_options['text-fields']['border-radius']).';';
    echo '-web-border-radius:'.$get_form_options['text-fields']['border-radius'].$main_class_object->swfw_get_saved_styles($get_form_options['text-fields']['border-radius']).';';
    echo '-moz-border-radius:'.$get_form_options['text-fields']['border-radius'].$main_class_object->swfw_get_saved_styles($get_form_options['text-fields']['border-radius']).';';
}  ?>
}

body #wpforms-<?php echo $css_form_id ?> .wpforms-form .wpforms-field.wpforms-field-select select {

    <?php echo $main_class_object->swfw_get_saved_styles( $css_form_id, 'dropdown-fields' );  ?>
         <?php
if ( empty( $get_form_options['dropdown-fields']['border-size'] ) ) {
    echo 'border-width: 1px;';
}
?>
}

body #wpforms-<?php echo $css_form_id ?> .wpforms-form .wpforms-field-radio li label {
   <?php echo $main_class_object->swfw_get_saved_styles( $css_form_id, 'radio-inputs' );  ?>
}

body #wpforms-<?php echo $css_form_id ?> .wpforms-form .wpforms-field-checkbox li label {
   <?php echo $main_class_object->swfw_get_saved_styles( $css_form_id, 'checkbox-inputs' );  ?>
}


body #wpforms-<?php echo $css_form_id ?> .wpforms-form .wpforms-field .wpforms-field-description {
 <?php echo $main_class_object->swfw_get_saved_styles( $css_form_id, 'field-descriptions' );  ?>
 <?php echo $main_class_object->swfw_get_saved_styles( $css_form_id, 'field-labels' );  ?>
}

body #wpforms-<?php echo $css_form_id ?> .wpforms-form .wpforms-field label.wpforms-field-label {
    <?php echo $main_class_object->swfw_get_saved_styles( $css_form_id, 'field-labels' );  ?>
}

body #wpforms-<?php echo $css_form_id ?> .wpforms-form .gform_fields .gsection .gsection_title {
   <?php echo $main_class_object->swfw_get_saved_styles( $css_form_id, 'section-break-title' );  ?>
}

body #wpforms-<?php echo $css_form_id ?> .wpforms-form .gform_fields .gsection .gsection_description {
   <?php echo $main_class_object->swfw_get_saved_styles( $css_form_id, 'section-break-description' );  ?>
}

body #wpforms-<?php echo $css_form_id ?> .wpforms-form .gform_fields .gfield .ginput_container {
}

body #wpforms-confirmation-_<?php echo $css_form_id ?>  {
    <?php echo $main_class_object->swfw_get_saved_styles( $css_form_id, 'confirmation-message' );  ?>
          <?php
if ( empty( $get_form_options['confirmation-message']['border-size'] ) ) {
    echo 'border-width: 1px;';
}
?>
}

body #wpforms-<?php echo $css_form_id ?> label.wpforms-error {
    <?php echo $main_class_object->swfw_get_saved_styles( $css_form_id, 'error-message' );  ?>
          <?php
if ( empty( $get_form_options['error-message']['border-size'] ) ) {
    echo 'border-width: 1px;';
}
?>
}



/*Option to add custom CSS */

<?php
if ( isset( $get_form_options['general-settings']['custom-css'] ) ) {
    echo $get_form_options['general-settings']['custom-css'];
} ?>
        </style>
