INSERT INTO expediente_movimiento (id_expediente_movimiento, texto, id_tipo_movimiento, para_digesto, json_data) VALUES
    ('60ca80e6-e4b3-4810-a27c-d97194245d6d'::UUID, 'Disposición Regular', '294f7381-11da-4e71-b11d-bed341a70672'::UUID, true, NULL),
    ('3dd05c9b-2170-46a5-aa4e-06361b6e252d'::UUID, 'Una resolución', '5daa44c2-2e36-4c1d-8eb4-d77beefa8a66'::UUID, true, NULL),
    ('e12614f2-77b8-4140-8ccb-2fa350f14895'::UUID, 'Un movimiento simple', '441cbad3-7a8f-40e6-a003-1cb0e957bd82'::UUID, false, NULL),
    ('5cfc1636-0cd6-4d88-83a9-ca6cd0e36ce0'::UUID, 'Una notificación', '02c0c5b3-fe2f-4804-8b5a-d66d43ac1131'::UUID, false, NULL),
    ('1e942134-da93-4f82-bfb8-62c02998655e'::UUID, 'Disposición Inscripción', '294f7381-11da-4e71-b11d-bed341a70672'::UUID, true, '{"InscripcionProveedor": {"id_proveedor": "123"}}'::JSONB),
    ('d194102b-ce66-4e1d-86e7-7f2ad9df1dbd'::UUID, 'Disposición Suspención', '294f7381-11da-4e71-b11d-bed341a70672'::UUID, true, '{"SuspencionProveedor": {"id_proveedor": "6969"}}'::JSONB);

