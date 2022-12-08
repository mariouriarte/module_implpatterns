import { Injectable } from '@nestjs/common';
import { CreateComprobanteDto } from './dto/create-comprobante.dto';
import { PrismaService } from "../prisma/prisma.service";

@Injectable()
export class ComprobantesService {
  constructor(private prisma: PrismaService) {}

  create(createComprobanteDto: CreateComprobanteDto) {
    return this.prisma.comprobante.create({ data: createComprobanteDto})
  }

  findAll() {
    return this.prisma.comprobante.findMany();
  }
}
