<?php

 $wp_customize->add_section( 'sfwf_form_id_form_header' , array(
    'title' => 'Form Header',
    'panel' => 'sfwf_panel',
  ) );

 $wp_customize->add_setting( 'sfwf_form_id_'.$current_form_id.'[form-header][background-color]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize, // WP_Customize_Manager
    'sfwf_form_id_'.$current_form_id.'[form-header][background-color]', // Setting id
    array( // Args, including any custom ones.
      'label' => __( 'Header Background Color' ),
      'section' => 'sfwf_form_id_form_header',
    )
  )
);

  $wp_customize->add_setting( 'sfwf_form_id_'.$current_form_id.'[form-header][border-size]' , array(
      'default'     => '0px',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control('sfwf_form_id_'.$current_form_id.'[form-header][border-size]',   array(
    'type' => 'text',
    'priority' => 10, // Within the section.
    'section' => 'sfwf_form_id_form_header', // Required, core or custom.
    'label' => __( 'Header Border Size' ),
   'input_attrs' => array(
    'placeholder' => 'Example: 4px or 10%'
  )
  )
);

   $wp_customize->add_setting( 'sfwf_form_id_'.$current_form_id.'[form-header][border-type]' , array(
      'default'     => 'inherit',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control('sfwf_form_id_'.$current_form_id.'[form-header][border-type]',   array(
    'type' => 'select',
    'priority' => 10, // Within the section.
    'section' => 'sfwf_form_id_form_header', // Required, core or custom.
    'label' => __( 'Header Border Type' ),
    'choices'        => $border_types,
  )
);

 $wp_customize->add_setting( 'sfwf_form_id_'.$current_form_id.'[form-header][border-color]' , array(
      //'default'     => '#000000', Removed border color
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize, // WP_Customize_Manager
    'sfwf_form_id_'.$current_form_id.'[form-header][border-color]', // Setting id
    array( // Args, including any custom ones.
      'label' => __( 'Header Border Color' ),
      'section' => 'sfwf_form_id_form_header',
    )
  )
);

 $wp_customize->add_setting( 'sfwf_form_id_'.$current_form_id.'[form-header][border-radius]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control('sfwf_form_id_'.$current_form_id.'[form-header][border-radius]',   array(
    'type' => 'text',
    'priority' => 10, // Within the section.
    'section' => 'sfwf_form_id_form_header', // Required, core or custom.
    'label' => __( 'Header Border Radius' ),
   'input_attrs' => array(
    'placeholder' => 'Example: 4px or 10%'
  )
  )
);

   $wp_customize->add_setting( 'sfwf_form_id_'.$current_form_id.'[form-header][margin]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control('sfwf_form_id_'.$current_form_id.'[form-header][margin]',   array(
    'type' => 'text',
    'priority' => 10, // Within the section.
    'section' => 'sfwf_form_id_form_header', // Required, core or custom.
    'label' => __( 'Margin' ),
   'input_attrs' => array(
    'placeholder' => 'Example: 5px 10px 5px 10px'
  )
  )
);

   $wp_customize->add_setting( 'sfwf_form_id_'.$current_form_id.'[form-header][padding]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control('sfwf_form_id_'.$current_form_id.'[form-header][padding]',   array(
    'type' => 'text',
    'priority' => 10, // Within the section.
    'section' => 'sfwf_form_id_form_header', // Required, core or custom.
    'label' => __( 'Padding' ),
   'input_attrs' => array(
    'placeholder' => 'Example: 5px 10px 5px 10px'
  )
  )
);