export type NavItem = {
  href: string;
  label: string;
};

export type PageProps<TParams = Record<string, string>> = {
  params: Promise<TParams>;
  searchParams: Promise<Record<string, string | string[] | undefined>>;
};
