import { PrismaClient } from "../generated/prisma/client";

type PrismaGlobal = typeof globalThis & {
  prisma?: PrismaClient;
};

const prismaGlobal = globalThis as PrismaGlobal;

export const db =
  prismaGlobal.prisma ??
  new PrismaClient({
    log: process.env["NODE_ENV"] === "development" ? ["query", "error", "warn"] : ["error"],
  });

if (process.env["NODE_ENV"] !== "production") {
  prismaGlobal.prisma = db;
}

export default db;
