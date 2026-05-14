import { z } from "zod";

export const contactSchema = z.object({
  name: z.string().trim().min(2, "Please enter your name").max(120),
  email: z.string().trim().email("Please enter a valid email").max(180),
  phone: z.string().trim().max(80).optional().or(z.literal("")),
  company: z.string().trim().max(160).optional().or(z.literal("")),
  department: z.enum(["Accounting & Taxation", "Finance", "Insurance", "Remit", "Wealth", "Business Advisory"]),
  desiredTime: z.string().trim().max(120).optional().or(z.literal("")),
  subject: z.string().trim().min(3, "Please enter a subject").max(180),
  message: z.string().trim().min(10, "Please enter a message").max(4000),
  source: z.enum(["INN_GROUP", "ASSOCIATES", "WEALTH"]).default("INN_GROUP"),
});

export type ContactInput = z.infer<typeof contactSchema>;
