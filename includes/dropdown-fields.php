<?php
//form dropdown section

$wp_customize->add_section( 'sfwf_form_id_dropdown_fields' , array(
    'title' => 'Dropdown Fields',
    'panel' => 'sfwf_panel',
  ) );

 $wp_customize->add_setting( 'sfwf_form_id_'.$current_form_id.'[dropdown-fields][max-width]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control('sfwf_form_id_'.$current_form_id.'[dropdown-fields][max-width]',   array(
    'type' => 'text',
    'priority' => 10, // Within the section.
    'section' => 'sfwf_form_id_dropdown_fields', // Required, core or custom.
    'label' => __( 'Maximum Width' ),
   'input_attrs' => array(
    'placeholder' => 'Example: 400px or 90%'
  )
  )
);

   $wp_customize->add_setting( 'sfwf_form_id_'.$current_form_id.'[dropdown-fields][font-size]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control('sfwf_form_id_'.$current_form_id.'[dropdown-fields][font-size]',   array(
    'type' => 'text',
    'priority' => 10, // Within the section.
    'section' => 'sfwf_form_id_dropdown_fields', // Required, core or custom.
    'label' => __( 'Font Size' ),
   'input_attrs' => array(
    'placeholder' => 'Example: 40px'
  )
  )
);

$wp_customize->add_setting( 'sfwf_form_id_'.$current_form_id.'[dropdown-fields][font-color]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize, // WP_Customize_Manager
    'sfwf_form_id_'.$current_form_id.'[dropdown-fields][font-color]', // Setting id
    array( // Args, including any custom ones.
      'label' => __( 'Font Color' ),
      'section' => 'sfwf_form_id_dropdown_fields',
    )
  )
);
  $wp_customize->add_setting( 'sfwf_form_id_'.$current_form_id.'[dropdown-fields][border-size]' , array(
      'default'     => '0px',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control('sfwf_form_id_'.$current_form_id.'[dropdown-fields][border-size]',   array(
    'type' => 'text',
    'priority' => 10, // Within the section.
    'section' => 'sfwf_form_id_dropdown_fields', // Required, core or custom.
    'label' => __( 'Border Size' ),
   'input_attrs' => array(
    'placeholder' => 'Example: 4px or 10%'
  )
  )
);

   $wp_customize->add_setting( 'sfwf_form_id_'.$current_form_id.'[dropdown-fields][border-type]' , array(
      'default'     => 'inherit',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control('sfwf_form_id_'.$current_form_id.'[dropdown-fields][border-type]',   array(
    'type' => 'select',
    'priority' => 10, // Within the section.
    'section' => 'sfwf_form_id_dropdown_fields', // Required, core or custom.
    'label' => __( 'Border Type' ),
    'choices'        => $border_types,
  )
);

 $wp_customize->add_setting( 'sfwf_form_id_'.$current_form_id.'[dropdown-fields][border-color]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize, // WP_Customize_Manager
    'sfwf_form_id_'.$current_form_id.'[dropdown-fields][border-color]', // Setting id
    array( // Args, including any custom ones.
      'label' => __( 'Border Color' ),
      'section' => 'sfwf_form_id_dropdown_fields',
    )
  )
);

 $wp_customize->add_setting( 'sfwf_form_id_'.$current_form_id.'[dropdown-fields][border-radius]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control('sfwf_form_id_'.$current_form_id.'[dropdown-fields][border-radius]',   array(
    'type' => 'text',
    'priority' => 10, // Within the section.
    'section' => 'sfwf_form_id_dropdown_fields', // Required, core or custom.
    'label' => __( 'Border Radius' ),
   'input_attrs' => array(
    'placeholder' => 'Example: 4px or 10%'
  )
  )
);

 $wp_customize->add_setting( 'sfwf_form_id_'.$current_form_id.'[dropdown-fields][background-color]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize, // WP_Customize_Manager
    'sfwf_form_id_'.$current_form_id.'[dropdown-fields][background-color]', // Setting id
    array( // Args, including any custom ones.
      'label' => __( 'Background Color' ),
      'section' => 'sfwf_form_id_dropdown_fields',
    )
  )
);


  $wp_customize->add_setting( 'sfwf_form_id_'.$current_form_id.'[dropdown-fields][margin]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control('sfwf_form_id_'.$current_form_id.'[dropdown-fields][margin]',   array(
    'type' => 'text',
    'priority' => 10, // Within the section.
    'section' => 'sfwf_form_id_dropdown_fields', // Required, core or custom.
    'label' => __( 'Margin' ),
   'input_attrs' => array(
    'placeholder' => 'Example: 5px 10px 5px 10px'
  )
  )
);

   $wp_customize->add_setting( 'sfwf_form_id_'.$current_form_id.'[dropdown-fields][padding]' , array(
      'default'     => '',
      'transport'   => 'postMessage',
      'type' => 'option'
  ) );

  $wp_customize->add_control('sfwf_form_id_'.$current_form_id.'[dropdown-fields][padding]',   array(
    'type' => 'text',
    'priority' => 10, // Within the section.
    'section' => 'sfwf_form_id_dropdown_fields', // Required, core or custom.
    'label' => __( 'Padding' ),
   'input_attrs' => array(
    'placeholder' => 'Example: 5px 10px 5px 10px'
  )
  )
);