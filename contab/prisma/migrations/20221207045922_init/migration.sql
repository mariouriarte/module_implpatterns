-- CreateTable
CREATE TABLE "Comprobante" (
    "idComprobante" SERIAL NOT NULL,
    "tipoComprobante" TEXT,
    "fechaComprobante" TIMESTAMP(3) NOT NULL DEFAULT CURRENT_TIMESTAMP,
    "idRegistroExterno" INTEGER NOT NULL,
    "procesoOrigen" TEXT,
    "glosa" TEXT,
    "estado" TEXT,

    CONSTRAINT "Comprobante_pkey" PRIMARY KEY ("idComprobante")
);
