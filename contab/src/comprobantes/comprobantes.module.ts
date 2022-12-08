import { Module } from '@nestjs/common';
import { ComprobantesService } from './comprobantes.service';
import { ComprobantesController } from './comprobantes.controller';
import {PrismaModule} from "../prisma/prisma.module";

@Module({
  imports: [PrismaModule],
  controllers: [ComprobantesController],
  providers: [ComprobantesService]
})
export class ComprobantesModule {}
