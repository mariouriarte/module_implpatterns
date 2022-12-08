
export class CreateComprobanteDto {
    idComprobante: number;
    tipoComprobante: string;
    fechaComprobante: Date;
    idRegistroExterno: number;
    procesoOrigen: string;
    glosa: string;
    estado: string;
}
