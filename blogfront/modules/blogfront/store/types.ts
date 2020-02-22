export interface Author {
  name: string;
  avatar: null;
  key: string;
}

export interface Path {
  path: string;
  name: string;
}

export interface Category {
  path: Path[];
  name: string;
  id: number;
  slug: string;
}
export interface Post {
  date: string;
  thumbnail: string;
  author: Author;
  id: number;
  categories: Category[];
  title: string;
  type: string;
  gallery: string[];
  isHot: boolean;
  urlKey: string;
}
