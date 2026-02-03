// Mock data for BLVD Specialty Coffee Admin Panel
// Structured to match planned MySQL schema for easy API integration later

export interface Reservation {
  id: string;
  customerName: string;
  email: string;
  phone: string;
  date: string;
  time: string;
  partySize: number;
  status: 'pending' | 'confirmed' | 'completed' | 'cancelled';
  notes?: string;
  createdAt: string;
}

export interface HighTeaReservation {
  id: string;
  customerName: string;
  email: string;
  phone: string;
  date: string;
  time: string;
  partySize: number;
  package: 'standard' | 'deluxe' | 'premium';
  dietaryRequirements?: string;
  status: 'pending' | 'confirmed' | 'completed' | 'cancelled';
  createdAt: string;
}

export interface Event {
  id: string;
  title: string;
  description: string;
  date: string;
  time: string;
  location: string;
  price: number;
  status: 'draft' | 'published';
  imageUrl?: string;
  createdAt: string;
}

export interface SpecialDay {
  id: string;
  date: string;
  name: string;
  description?: string;
}

export interface Message {
  id: string;
  senderName: string;
  senderEmail: string;
  subject: string;
  message: string;
  isRead: boolean;
  createdAt: string;
}

export interface Review {
  id: string;
  customerName: string;
  rating: number;
  comment: string;
  status: 'pending' | 'approved' | 'rejected';
  isFeatured: boolean;
  reply?: string;
  createdAt: string;
}

export interface AdminUser {
  id: string;
  name: string;
  email: string;
  role: 'admin' | 'owner' | 'manager';
  isActive: boolean;
  lastLogin?: string;
  createdAt: string;
}

// Mock Reservations
export const mockReservations: Reservation[] = [
  {
    id: '1',
    customerName: 'John Smith',
    email: 'john@example.com',
    phone: '+1 234 567 8901',
    date: '2026-02-05',
    time: '12:00',
    partySize: 4,
    status: 'confirmed',
    notes: 'Birthday celebration',
    createdAt: '2026-02-01T10:00:00Z',
  },
  {
    id: '2',
    customerName: 'Alice Johnson',
    email: 'alice@example.com',
    phone: '+1 234 567 8902',
    date: '2026-02-05',
    time: '14:00',
    partySize: 2,
    status: 'pending',
    createdAt: '2026-02-02T14:30:00Z',
  },
  {
    id: '3',
    customerName: 'Robert Brown',
    email: 'robert@example.com',
    phone: '+1 234 567 8903',
    date: '2026-02-06',
    time: '11:00',
    partySize: 6,
    status: 'pending',
    notes: 'Prefer outdoor seating',
    createdAt: '2026-02-02T16:00:00Z',
  },
  {
    id: '4',
    customerName: 'Emma Wilson',
    email: 'emma@example.com',
    phone: '+1 234 567 8904',
    date: '2026-02-04',
    time: '10:00',
    partySize: 3,
    status: 'completed',
    createdAt: '2026-01-30T09:00:00Z',
  },
];

// Mock High Tea Reservations
export const mockHighTeaReservations: HighTeaReservation[] = [
  {
    id: '1',
    customerName: 'Victoria Adams',
    email: 'victoria@example.com',
    phone: '+1 234 567 8910',
    date: '2026-02-07',
    time: '15:00',
    partySize: 4,
    package: 'premium',
    dietaryRequirements: 'Gluten-free options needed',
    status: 'confirmed',
    createdAt: '2026-02-01T11:00:00Z',
  },
  {
    id: '2',
    customerName: 'Grace Thompson',
    email: 'grace@example.com',
    phone: '+1 234 567 8911',
    date: '2026-02-08',
    time: '14:00',
    partySize: 2,
    package: 'deluxe',
    status: 'pending',
    createdAt: '2026-02-02T15:00:00Z',
  },
];

// Mock Events
export const mockEvents: Event[] = [
  {
    id: '1',
    title: 'Valentine\'s Day Special',
    description: 'A romantic evening with live jazz music and specialty coffee cocktails.',
    date: '2026-02-14',
    time: '18:00',
    location: 'Main Hall',
    price: 75,
    status: 'published',
    createdAt: '2026-01-15T10:00:00Z',
  },
  {
    id: '2',
    title: 'Coffee Brewing Workshop',
    description: 'Learn the art of pour-over and espresso from our master baristas.',
    date: '2026-02-20',
    time: '10:00',
    location: 'Training Room',
    price: 45,
    status: 'draft',
    createdAt: '2026-01-20T14:00:00Z',
  },
  {
    id: '3',
    title: 'Sunday Brunch Live Music',
    description: 'Enjoy acoustic performances while savoring our weekend brunch menu.',
    date: '2026-02-09',
    time: '11:00',
    location: 'Garden Terrace',
    price: 0,
    status: 'published',
    createdAt: '2026-01-25T09:00:00Z',
  },
];

// Mock Special Days
export const mockSpecialDays: SpecialDay[] = [
  { id: '1', date: '2026-02-14', name: 'Valentine\'s Day', description: 'Special menu available' },
  { id: '2', date: '2026-02-17', name: 'Presidents Day', description: 'Extended hours' },
  { id: '3', date: '2026-03-17', name: 'St. Patrick\'s Day', description: 'Irish coffee specials' },
];

// Mock Messages
export const mockMessages: Message[] = [
  {
    id: '1',
    senderName: 'James Cooper',
    senderEmail: 'james@example.com',
    subject: 'Private Event Inquiry',
    message: 'Hi, I\'m interested in hosting a corporate event at your venue. We would need space for approximately 50 people. Could you please send me information about private event packages and availability for March?',
    isRead: false,
    createdAt: '2026-02-03T09:00:00Z',
  },
  {
    id: '2',
    senderName: 'Maria Garcia',
    senderEmail: 'maria@example.com',
    subject: 'Gift Card Question',
    message: 'Do you offer gift cards? I\'d like to purchase one for my mother\'s birthday.',
    isRead: true,
    createdAt: '2026-02-02T14:00:00Z',
  },
  {
    id: '3',
    senderName: 'David Kim',
    senderEmail: 'david@example.com',
    subject: 'Feedback on Recent Visit',
    message: 'I visited your café last weekend and had an amazing experience. The latte art was beautiful and the pastries were delicious. Keep up the great work!',
    isRead: false,
    createdAt: '2026-02-01T16:30:00Z',
  },
];

// Mock Reviews
export const mockReviews: Review[] = [
  {
    id: '1',
    customerName: 'Sophie Taylor',
    rating: 5,
    comment: 'Absolutely love this place! The ambiance is perfect for working remotely and the coffee is exceptional.',
    status: 'approved',
    isFeatured: true,
    createdAt: '2026-02-01T10:00:00Z',
  },
  {
    id: '2',
    customerName: 'Michael Chen',
    rating: 4,
    comment: 'Great coffee and friendly staff. Would appreciate more vegan pastry options.',
    status: 'approved',
    isFeatured: false,
    reply: 'Thank you for your feedback! We\'re expanding our vegan menu soon.',
    createdAt: '2026-01-30T15:00:00Z',
  },
  {
    id: '3',
    customerName: 'Anonymous',
    rating: 2,
    comment: 'Service was slow during peak hours.',
    status: 'pending',
    isFeatured: false,
    createdAt: '2026-02-02T12:00:00Z',
  },
];

// Mock Admin Users
export const mockAdminUsers: AdminUser[] = [
  {
    id: '1',
    name: 'Sarah Admin',
    email: 'admin@blvd.coffee',
    role: 'admin',
    isActive: true,
    lastLogin: '2026-02-03T08:00:00Z',
    createdAt: '2025-01-01T00:00:00Z',
  },
  {
    id: '2',
    name: 'Michael Owner',
    email: 'owner@blvd.coffee',
    role: 'owner',
    isActive: true,
    lastLogin: '2026-02-02T10:00:00Z',
    createdAt: '2025-01-01T00:00:00Z',
  },
  {
    id: '3',
    name: 'Emily Manager',
    email: 'manager@blvd.coffee',
    role: 'manager',
    isActive: true,
    lastLogin: '2026-02-03T07:30:00Z',
    createdAt: '2025-06-15T00:00:00Z',
  },
  {
    id: '4',
    name: 'Tom Staff',
    email: 'tom@blvd.coffee',
    role: 'manager',
    isActive: false,
    createdAt: '2025-09-01T00:00:00Z',
  },
];

// High Tea Packages
export const highTeaPackages = {
  standard: {
    name: 'Classic High Tea',
    price: 45,
    description: 'Selection of teas, finger sandwiches, scones with clotted cream and jam',
  },
  deluxe: {
    name: 'Deluxe High Tea',
    price: 65,
    description: 'Classic selection plus champagne, premium pastries, and chocolate truffles',
  },
  premium: {
    name: 'Premium Experience',
    price: 95,
    description: 'Full deluxe menu with private seating, personalized service, and take-home gift',
  },
};

// Dashboard stats
export const getDashboardStats = () => ({
  totalReservations: mockReservations.length + mockHighTeaReservations.length,
  pendingReservations: [...mockReservations, ...mockHighTeaReservations].filter(r => r.status === 'pending').length,
  upcomingEvents: mockEvents.filter(e => e.status === 'published').length,
  unreadMessages: mockMessages.filter(m => !m.isRead).length,
  pendingReviews: mockReviews.filter(r => r.status === 'pending').length,
  todayReservations: mockReservations.filter(r => r.date === '2026-02-03').length,
});
