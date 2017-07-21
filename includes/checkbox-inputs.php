<?php

$wp_customize->add_section( 'sfwf_form_id_checkbox_inputs' , array(
    'title' => 'Checkbox Inputs',
    'panel' => 'sfwf_panel',
  ) );

//  $wp_customize->add_setting( 'sfwf_form_id_'.$current_form_id.'[checkbox-inputs][max-width]' , array(
//       'default'     => '',
//       'transport'   => 'postMessage',
//       'type' => 'option'
//   ) );

//   $wp_customize->add_control('sfwf_form_id_'.$current_form_id.'[checkbox-inputs][max-width]',   array(
//     'type' => 'text',
//     'priority' => 10, // Within the section.
//     'section' => 'sfwf_form_id_checkbox_inputs', // Required, core or custom.
//     'label' => __( 'Maximum Width' ),
//    'input_attrs' => array(
//     'placeholder' => 'Example: 400px or 90%'
//   )
//   )
// );

   $wp_customize->add_setting( 'sfwf_form_id_'.$current_form_id.'[checkbox-inputs][font-size]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control('sfwf_form_id_'.$current_form_id.'[checkbox-inputs][font-size]',   array(
    'type' => 'text',
    'priority' => 10, // Within the section.
    'section' => 'sfwf_form_id_checkbox_inputs', // Required, core or custom.
    'label' => __( 'Font Size' ),
   'input_attrs' => array(
    'placeholder' => 'Example: 40px'
  )
  )
);

$wp_customize->add_setting( 'sfwf_form_id_'.$current_form_id.'[checkbox-inputs][font-color]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize, // WP_Customize_Manager
    'sfwf_form_id_'.$current_form_id.'[checkbox-inputs][font-color]', // Setting id
    array( // Args, including any custom ones.
      'label' => __( 'Font Color' ),
      'section' => 'sfwf_form_id_checkbox_inputs',
    )
  )
);
  

   $wp_customize->add_setting( 'sfwf_form_id_'.$current_form_id.'[checkbox-inputs][padding]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control('sfwf_form_id_'.$current_form_id.'[checkbox-inputs][padding]',   array(
    'type' => 'text',
    'priority' => 10, // Within the section.
    'section' => 'sfwf_form_id_checkbox_inputs', // Required, core or custom.
    'label' => __( 'Padding' ),
   'input_attrs' => array(
    'placeholder' => 'Example: 5px 10px 5px 10px'
  )
  )
);