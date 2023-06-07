export interface User {
  "@id" ?: string;
  id: number;
  email: string;
  roles: any;
  password: string;
  displayName: string;
  isVerified: boolean;
}
