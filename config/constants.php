<?php
return [
    'empresa' => [
        'logotipo' => [
            'ruta' => storage_path( 'app/empresa/logotipo/' ),
        ]
    ],
    'plantilla' => [
        'capacitacion' => [
            'certificado'=> [
                'formato' => [
                    'pdf' => 'pdf',
                ],
                'ruta' => [
                    'pdf' => storage_path( 'app/plantillas/pdf/capacitacion/%name%' ),
                ],
            ],
            'reporte' => [
                'formato' => [
                    'excel' => 'excel',
                ],
                'ruta' => [
                    'excel' => storage_path( 'app/plantillas/excel/capacitacion/reporte.xlsx' ),
                ],
            ],
            'dc3' => [
                'formato' => [
                    'excel' => 'excel',
                    'pdf' => 'pdf',
                ],
                'ruta' => [
                    'excel' => storage_path( 'app/plantillas/excel/capacitacion/dc3.xlsx' ),
                    'pdf' => storage_path( 'app/plantillas/pdf/capacitacion/dc3/%name%' ),
                ],
            ],
            'certificado' => [
                'formato' => [
                    'pdf' => 'pdf',
                ],
                'ruta' => [
                    'pdf' => storage_path( 'app/plantillas/pdf/capacitacion/certificado/%name%' ),
                ],
                'imagenes' => [
                    'logo-big' => storage_path( 'app/plantillas/css/img/logo_big_631.png' ),
                    'logo-circle' => storage_path( 'app/plantillas/css/img/logo_circle.png' ),
                    'logo-eye' => storage_path( 'app/plantillas/css/img/logo_eye.png' ),
                    '_a' => storage_path( 'app/plantillas/css/img/_a.png' ),
                    '_b' => storage_path( 'app/plantillas/css/img/_b.png' ),
                ]
            ]
        ]
    ],
    'ghostscript' => [
        'plantilla' => [
            'pdf' => [
                'ruta' => storage_path( 'app/plantillas/Ghostscript/pdf_info.ps' ),
            ]
        ]
    ],
    'css' => [
        'certificado-pdf-style' => storage_path( 'app/plantillas/css/certificado-pdf-style.css' ),
        'dc3-pdf-style' => storage_path( 'app/plantillas/css/dc3-pdf-style.css' ),
    ],
    'fonts' => [
        'dir' => storage_path( 'app/plantillas/css/fonts/' ),
        'font-names' => [
            'arialroundedmt' => [
                'R' => 'arlrdbd.ttf'
            ],
            'arialnarrow' => [
                'R' => 'arialn.ttf'
            ],
            'monoelar' => [
                'R' => 'monoela.ttf'
            ],
            'britanicbold' => [
                'R' => 'britanicb.ttf'
            ],
            'calibri' => [
                'R' => 'calibri.ttf'
            ]
        ]
    ],
];