"use server";

import { revalidatePath } from "next/cache";
import { prisma } from "@/lib/prisma";

export async function updateCmsPage(formData: FormData) {
  const id = String(formData.get("id") ?? "");
  const title = String(formData.get("title") ?? "");
  const description = String(formData.get("description") ?? "");

  if (!id || !title || !description) return;

  await prisma.page.update({ where: { id }, data: { title, description } });
  revalidatePath("/admin/content");
}
