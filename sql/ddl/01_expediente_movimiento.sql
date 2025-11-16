
CREATE TABLE expediente_movimiento (
	id_expediente_movimiento uuid DEFAULT gen_random_uuid() NOT NULL,
	texto text NULL,
	id_tipo_movimiento uuid NOT NULL,
	para_digesto boolean DEFAULT false NOT NULL,
    json_data jsonb NULL,
	CONSTRAINT pk_id_expediente_movimiento PRIMARY KEY (id_expediente_movimiento)
);

CREATE TABLE tipo_movimiento (
    id_tipo_movimiento uuid DEFAULT gen_random_uuid() NOT NULL,
    descripcion character varying(255) NOT NULL,
    protocoliza boolean DEFAULT false NOT NULL,
    CONSTRAINT pk_id_tipo_movimiento PRIMARY KEY (id_tipo_movimiento)
);

ALTER TABLE expediente_movimiento
    ADD CONSTRAINT fk_expediente_movimiento_tipo_movimiento
    FOREIGN KEY (id_tipo_movimiento)
    REFERENCES tipo_movimiento (id_tipo_movimiento);

