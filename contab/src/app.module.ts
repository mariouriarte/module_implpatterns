import { Module } from '@nestjs/common';
import { AppController } from './app.controller';
import { AppService } from './app.service';
import { PrismaModule } from './prisma/prisma.module';
import { ComprobantesModule } from './comprobantes/comprobantes.module';

@Module({
  imports: [PrismaModule, ComprobantesModule],
  controllers: [AppController],
  providers: [AppService],
})
export class AppModule {}
