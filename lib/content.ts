import { BadgeDollarSign, BarChart3, BriefcaseBusiness, Building2, Calculator, Gem, HandCoins, Landmark, LineChart, PiggyBank, ReceiptText, ShieldCheck, TrendingUp, UsersRound, WalletCards } from "lucide-react";

export type BrandKey = "INN_GROUP" | "ASSOCIATES" | "WEALTH";

export type BrandTheme = {
  key: BrandKey;
  slug: string;
  name: string;
  strapline: string;
  domain: string;
  email: string;
  phone: string;
  palette: "navy" | "emerald" | "silver";
  gradient: string;
  accent: string;
};

export type ServiceItem = {
  title: string;
  description: string;
  href: string;
  icon: keyof typeof icons;
  brand: BrandKey;
};

export type PageContent = {
  slug: string;
  brand: BrandKey;
  eyebrow: string;
  title: string;
  description: string;
  sections: Array<{ heading: string; body: string; points?: string[] }>;
};

export const icons = {
  accounting: Calculator,
  tax: ReceiptText,
  loans: Landmark,
  insurance: ShieldCheck,
  payroll: WalletCards,
  remit: HandCoins,
  advisory: BriefcaseBusiness,
  planning: LineChart,
  investment: TrendingUp,
  retirement: PiggyBank,
  wealth: Gem,
  team: UsersRound,
  business: Building2,
  metrics: BarChart3,
  money: BadgeDollarSign,
};

export const brands: Record<BrandKey, BrandTheme> = {
  INN_GROUP: {
    key: "INN_GROUP",
    slug: "inn-group",
    name: "INN Group",
    strapline: "To put you first and serve you best",
    domain: "inngroup.com.au",
    email: "info@inngroup.com.au",
    phone: "+61 02 8592 1165",
    palette: "navy",
    gradient: "from-[#071426] via-[#0b2038] to-[#17100a]",
    accent: "#d8b66a",
  },
  ASSOCIATES: {
    key: "ASSOCIATES",
    slug: "associates",
    name: "Innovative Associates",
    strapline: "Business For Your business",
    domain: "innovativeassociates.com.au",
    email: "info@innovativeassociates.com.au",
    phone: "0434 392 347",
    palette: "emerald",
    gradient: "from-white via-emerald-50 to-slate-100",
    accent: "#059669",
  },
  WEALTH: {
    key: "WEALTH",
    slug: "wealth",
    name: "Innovative Wealth",
    strapline: "Solutions to your wealth creations",
    domain: "innovativewealth.com.au",
    email: "info@inngroup.com.au",
    phone: "+61 02 8592 1165",
    palette: "silver",
    gradient: "from-black via-zinc-950 to-neutral-800",
    accent: "#cbd5e1",
  },
};

export const contactDetails = {
  address: "Suite 101, Level 10, 420 Pitt Street, Sydney NSW 2222",
  extendedAddress: "Suite 101, Level 10 - 420-426 Pitt Street, Sydney, NSW - 2000",
  mobiles: "0403 054 593 (Shamim), 0434 392 347 (Dila)",
  availability: "9-5 Availability & Support",
  offices: ["Sydney - HEAD OFFICE", "Canberra", "Darwin", "Perth", "Tasmania"],
  disclaimer:
    "The information contained in this website is for general information purposes only. The information is provided by Innovative associates and Innovative Wealth and while we endeavour to keep the information up to date and correct, we make no representations or warranties of any kind, express or implied, about the completeness, accuracy, reliability, suitability or availability with respect to the website or the information, products, services, or related graphics contained on the website for any purpose. Any reliance you place on such information is therefore strictly at your own risk.",
};

export const innServices: ServiceItem[] = [
  { title: "Accounting", description: "We are dedicated to providing quality, professional accounting solutions to small and medium business.", href: "/associates/accounting", icon: "accounting", brand: "INN_GROUP" },
  { title: "Taxation", description: "From individual to company, all the taxation matter at one place.", href: "/associates/tax-lodgement", icon: "tax", brand: "INN_GROUP" },
  { title: "Home Loans", description: "First home buyers, investment, refinance or commercials, we'll take care of you.", href: "/wealth/investment", icon: "loans", brand: "INN_GROUP" },
  { title: "Insurances", description: "Personal insurance, life insurance or any other insurance matters we have associated experts to guide you.", href: "/services", icon: "insurance", brand: "INN_GROUP" },
  { title: "Book keeping & payroll", description: "We specialise in providing customised, flexible and cost effective bookkeeping solutions for our clients.", href: "/associates/accounting", icon: "payroll", brand: "INN_GROUP" },
  { title: "Legal Remit", description: "Legal remit to Nepal on your finger tip. Download our app and send money instantly.", href: "/contact", icon: "remit", brand: "INN_GROUP" },
];

export const associateServices: ServiceItem[] = [
  { title: "Accounting and Taxation", description: "We are dedicated to providing quality, professional accounting solutions to small and medium business.", href: "/associates/accounting", icon: "accounting", brand: "ASSOCIATES" },
  { title: "Mortgage Broking", description: "With our help purchase residential or commercial real estate without the need to pay the full value immediately.", href: "/wealth/investment", icon: "loans", brand: "ASSOCIATES" },
  { title: "Business Advisory", description: "Whether you want to invest or refinance, ensure your current home loan is still the right one for you, we can help.", href: "/associates/business-advisory", icon: "advisory", brand: "ASSOCIATES" },
  { title: "Mentoring Program", description: "We understand the importance of mentoring so we compiled a program to help you through your mortgage broker journey.", href: "/associates/business-advisory", icon: "team", brand: "ASSOCIATES" },
  { title: "Financial Planning", description: "We provide complete financial planning so that you can immediately commence your business as a partner or sole trader.", href: "/wealth/financial-planning", icon: "planning", brand: "ASSOCIATES" },
  { title: "Book keeping & Payroll", description: "We specialise in providing customised, flexible and cost effective bookkeeping solutions for our clients for ease of mind.", href: "/associates/accounting", icon: "payroll", brand: "ASSOCIATES" },
];

export const wealthServices: ServiceItem[] = [
  { title: "First Home", description: "Ready to buy your first home? Let us Help! Contact us today and get a free consultation. We'll hold your hand until you moved in.", href: "/wealth/financial-planning", icon: "loans", brand: "WEALTH" },
  { title: "Refinance", description: "Refinance to get your home loan rates even lower, cash back and consolidate all your loans into one and save thousands!", href: "/wealth/investment", icon: "money", brand: "WEALTH" },
  { title: "Investments", description: "One property is never enough to retire comfortably. Invest now in appreciating assets to build your property portfolio.", href: "/wealth/investment", icon: "investment", brand: "WEALTH" },
  { title: "Insurance", description: "Are you prepared for rainy day? We'll guide you in all type of insurances from building, home & content, life, landlord and many more.", href: "/services", icon: "insurance", brand: "WEALTH" },
  { title: "Self Employed", description: "Are you a business owner and finding a hard to get a loan? Let us help you about how you can get a loan as business owner.", href: "/wealth/financial-planning", icon: "business", brand: "WEALTH" },
  { title: "SMSF", description: "Use your superannuation to purchase property. We can arrange loans under self-managed super fund to purchase your next investment property.", href: "/wealth/retirement", icon: "retirement", brand: "WEALTH" },
];

export const metrics = [
  { value: "10,000+", label: "Client served" },
  { value: "25+", label: "Years of experience" },
  { value: "9-5", label: "Availability & Support" },
  { value: "$100,000,000+", label: "Settled for our clients" },
];

export const team = [
  { name: "Dila Kharel", role: "Principal" },
  { name: "Sandeep Shrestha", role: "Accountant" },
  { name: "Bhanu Kharel", role: "General Manager" },
  { name: "Gopal Kandel", role: "Business Development Manager" },
  { name: "Anish Sapkota", role: "Tax Accountant" },
];

export const testimonials = [
  { quote: "I have been recommended by my employer for my Individual Tax to lodge with Innovative Associates. I found them very good and the best accountant in Sydney CBD.", author: "ANTANY PIRAPAKAR ANTANY JEYARASA" },
  { quote: "We are always treated with respect. We feel a sense of integrity infuses the company. Innovative Associates, Dila, and his team have helped with appropriate tax and business strategies.", author: "GRANNY'S HERBS & SPICES PTY LTD" },
  { quote: "Let's agree that sincere and qualified accountants get quality results, really happy with the performance at Dila's office and his accountants and bookkeeper.", author: "Rajman Thakali" },
  { quote: "Your help has been extremely valuable and we have enjoyed working with you and your team at Innovative Associates.", author: "George Drew, Revesby Sydney" },
  { quote: "Buying my first home was tough. Innovative Wealth guided me through each steps with completely hassle free.", author: "Dharma Adhikari" },
];

export const pages: Record<string, PageContent> = {
  home: {
    slug: "/",
    brand: "INN_GROUP",
    eyebrow: "Our Goal",
    title: "To put you first and serve you best",
    description:
      "We put you first and serve you the best. Whether to be accounting, tax, book-keeping, home loans or an insurance. We will hold your hand guide you all the way.",
    sections: [
      { heading: "Accounting & Taxation", body: "We are dedicated to providing quality, professional accounting solutions to small and medium business." },
      { heading: "Home Loans", body: "Whether you're first home buyer or simply buying an investment property to build your portfolio. We'll present you the best product available in the market and hold your hand along the way." },
      { heading: "Insurance", body: "Prevention is better than cure. So, protecting you, your loved ones and your hard earned assets is the utmost need at the current market situations." },
      { heading: "How we operate for you", body: "Get in touch by mail or phone, receive a free personal consultation, and let our team hold your hand until your matter is settled." },
    ],
  },
  about: {
    slug: "/about",
    brand: "INN_GROUP",
    eyebrow: "About",
    title: "About our company & our lawyers",
    description: "A modern premium presentation of the existing INN Group about page content.",
    sections: [
      { heading: "The Firm...", body: "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque. Nulla consequat massa quis enim." },
      { heading: "The Lawyers...", body: "Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus." },
      { heading: "Our Customers...", body: "Nullam dictum felis eu pede mollis pretium. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus." },
      { heading: "More about the company", body: "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus." },
      { heading: "More about our lawyers", body: "Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Lorem ipsum dolor sit amet, consectetuer adipiscing elit." },
    ],
  },
  services: {
    slug: "/services",
    brand: "INN_GROUP",
    eyebrow: "Areas of expertise",
    title: "Accounting, taxation, lending, insurance and remittance in one unified platform",
    description: "With years of experience, we're able to assist and guide you in many areas of our expertise.",
    sections: [
      { heading: "Accounting", body: "We are dedicated to providing quality, professional accounting solutions to small and medium business." },
      { heading: "Taxation", body: "From individual to company, all the taxation matter at one place." },
      { heading: "Home Loans", body: "First home buyers, investment, refinance or commercials, we'll take care of you." },
      { heading: "Insurances", body: "Personal insurance, life insurance or any other insurance matters we have associated experts to guide you." },
      { heading: "Book keeping & payroll", body: "We specialise in providing customised, flexible and cost effective bookkeeping solutions for our clients." },
      { heading: "Legal Remit", body: "Legal remit to Nepal on your finger tip. Download our app and send money instantly." },
    ],
  },
  contact: {
    slug: "/contact",
    brand: "INN_GROUP",
    eyebrow: "Contact Innovative",
    title: "Make an appointment",
    description: "Hello. Send your details and our team will respond to your queries immediately.",
    sections: [
      { heading: "Where you can find us", body: "Sydney - HEAD OFFICE. Suite 101, Level 10, 420 Pitt Street, Sydney NSW 2222. Phone: +61 02 8592 1165 | Mob: 0403 054 593 (Shamim), 0434 392 347 (Dila) | Email: info@inngroup.com.au" },
      { heading: "Australia wide presence", body: "So that, we could serve you the best, we have made our presence nationwide. Get in touch with one of our local office in your city. As our mission, we put you the first, to ensure we serve you the best." },
    ],
  },
  associates: {
    slug: "/associates",
    brand: "ASSOCIATES",
    eyebrow: "Innovative Associates",
    title: "Business For Your business",
    description: "Our firm is a proactive and progressive Mortgage, finance and Accounting firm offering full range of services on Mortgage Industry, finance Industry and accounting, taxation and business advisory work.",
    sections: [
      { heading: "Our Services", body: "Accounting and Taxation, Mortgage Broking, Business Advisory, Mentoring Program, Financial Planning, and Book keeping & Payroll." },
      { heading: "Our Core Values", body: "Highest standard of Service, Business for your business, Business ideas and Innovation." },
      { heading: "Highest standard of Service", body: "Our Professional holds memberships with various professional bodies that demonstrate our commitment to the highest standard of Services." },
      { heading: "Business for your business", body: "We always want you or your business to grow with required fulfillment of the legal and corporate account-abilities." },
      { heading: "Business ideas and Innovation", body: "We were delighted with our professionals in having the wide range of knowledge from the business perspective and professional perspective." },
    ],
  },
  taxLodgement: {
    slug: "/associates/tax-lodgement",
    brand: "ASSOCIATES",
    eyebrow: "Accounting and Taxation",
    title: "Tax lodgement for individuals, companies and growing businesses",
    description: "From individual to company, all the taxation matter at one place, supported by quality professional accounting solutions.",
    sections: [
      { heading: "Individual tax", body: "I have been recommended by my employer for my Individual Tax to lodge with Innovative Associates. I found them very good and the best accountant in Sydney CBD." },
      { heading: "Business tax", body: "Innovative Associates, Dila, and his team have helped with appropriate tax and business strategies." },
      { heading: "Tax and wealth creation strategy", body: "We support personal Tax, Business Tax and Wealth Creation strategy through Innovative Accountants and Home loan Advisers." },
    ],
  },
  accounting: {
    slug: "/associates/accounting",
    brand: "ASSOCIATES",
    eyebrow: "Accounting",
    title: "Professional accounting, bookkeeping and payroll",
    description: "We are dedicated to providing quality, professional accounting solutions to small and medium business.",
    sections: [
      { heading: "Accounting and Taxation", body: "We are dedicated to providing quality, professional accounting solutions to small and medium business." },
      { heading: "Book keeping & Payroll", body: "We specialise in providing customised, flexible and cost effective bookkeeping solutions for our clients for ease of mind." },
      { heading: "Business accountability", body: "We always want you or your business to grow with required fulfillment of the legal and corporate account-abilities." },
    ],
  },
  businessAdvisory: {
    slug: "/associates/business-advisory",
    brand: "ASSOCIATES",
    eyebrow: "Business Advisory",
    title: "Business ideas, innovation and mentoring",
    description: "Whether you want to invest or refinance, ensure your current home loan is still the right one for you, we can help.",
    sections: [
      { heading: "Business Advisory", body: "Whether you want to invest or refinance, ensure your current home loan is still the right one for you, we can help." },
      { heading: "Mentoring Program", body: "We understand the importance of mentoring so we compiled a program to help you through your mortgage broker journey." },
      { heading: "Business ideas and Innovation", body: "We were delighted with our professionals in having the wide range of knowledge from the business perspective and professional perspective." },
    ],
  },
  wealth: {
    slug: "/wealth",
    brand: "WEALTH",
    eyebrow: "Innovative Wealth",
    title: "From pre approval to property solutions to your wealth creations",
    description: "Financial Freedom could be just one phonecall away. Innovative Wealth leads by an example when it comes to serving the clients with personalized service.",
    sections: [
      { heading: "Financial Freedom could be just one phonecall away...", body: "As someone who takes pride in their achievements and is firmly committed to obtaining the best possible outcome for each client, Innovative Wealth leads by an example when it comes to serving the clients with personalized service. Honesty & Integrity is biggest assets of Innovative Wealth." },
      { heading: "From pre approval to property", body: "Whether you are buying an investment property, refinancing, a first time buyer, cash out, line of credit, buy to let investor or you are simply curious about how mortgages work, we are right here for you." },
      { heading: "Wealth creation", body: "We don't just organise your loan, but also a property, and we'll be there after your loan. We will help and guide you in accounting and taxation matters." },
    ],
  },
  financialPlanning: {
    slug: "/wealth/financial-planning",
    brand: "WEALTH",
    eyebrow: "Financial Planning",
    title: "Financial freedom could be just one phonecall away",
    description: "Complete guidance from first conversations to finance strategy, property decisions and wealth creation.",
    sections: [
      { heading: "First Home", body: "Ready to buy your first home? Let us Help! Contact us today and get a free consultation. We'll hold your hand until you moved in." },
      { heading: "Self Employed", body: "Are you a business owner and finding a hard to get a loan? Let us help you about how you can get a loan as business owner." },
      { heading: "Personalized service", body: "Innovative Wealth leads by an example when it comes to serving the clients with personalized service. Honesty & Integrity is biggest assets of Innovative Wealth." },
    ],
  },
  investment: {
    slug: "/wealth/investment",
    brand: "WEALTH",
    eyebrow: "Investment",
    title: "Property investment and refinance guidance",
    description: "Invest now in appreciating assets to build your property portfolio with mortgage, finance and tax-aware guidance.",
    sections: [
      { heading: "Investments", body: "One property is never enough to retire comfortably. Invest now in appreciating assets to build your property portfolio." },
      { heading: "Refinance", body: "Refinance to get your home loan rates even lower, cash back and consolidate all your loans into one and save thousands!" },
      { heading: "Property portfolio", body: "Whether you are buying an investment property, refinancing, a first time buyer, cash out, line of credit, buy to let investor or you are simply curious about how mortgages work, we are right here for you." },
    ],
  },
  retirement: {
    slug: "/wealth/retirement",
    brand: "WEALTH",
    eyebrow: "Retirement",
    title: "SMSF and retirement property strategies",
    description: "Use your superannuation to purchase property and structure finance for long-term wealth creation.",
    sections: [
      { heading: "SMSF", body: "Use your superannuation to purchase property. We can arrange loans under self-managed super fund to purchase your next investment property." },
      { heading: "Insurance", body: "Are you prepared for rainy day? We'll guide you in all type of insurances from building, home & content, life, landlord and many more." },
      { heading: "After your loan", body: "We'll be there after your loan. We will help and guide you in accounting and taxation matters. We'll help you to build your assets and guide you in how can you manage and reduce your taxation." },
    ],
  },
};

export const navItems = [
  { label: "Home", href: "/" },
  { label: "About", href: "/about" },
  { label: "Services", href: "/services" },
  { label: "Associates", href: "/associates" },
  { label: "Wealth", href: "/wealth" },
  { label: "Contact", href: "/contact" },
];

export const exploreLinks = [
  "Australian Taxation Office",
  "Tax Practitioners Board",
  "Department of Immigration",
  "CPA Austalia",
  "NSW Office of State Revenue",
  "Institute of Public Accountants",
  "MFAA",
  "ACT Revenue Office",
];
