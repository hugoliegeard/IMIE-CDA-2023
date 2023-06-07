export interface Post {
  "@id" ?: string;
  id: number;
  title: string;
  slug: string;
  content: string;
  isActive: boolean;
  imageName: string;
}