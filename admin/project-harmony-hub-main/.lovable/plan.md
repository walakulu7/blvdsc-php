

# BLVD Specialty Coffee - Admin Panel (Frontend Mockup)

Build a complete React admin panel with mock data, designed to later connect to your PHP/MySQL backend via REST API.

---

## Phase 1: Foundation & Layout

### Admin Shell
- Responsive sidebar navigation with collapsible menu
- Header with user profile dropdown and notifications bell
- Role indicator showing current user (Admin/Owner/Manager)
- Mobile-friendly hamburger menu

### Authentication UI (Mockup)
- Login page with branded design
- Role-based mock login (buttons to "login as Admin", "Owner", or "Manager")
- Session simulation for testing different role permissions

### Dashboard
- Statistics cards (total reservations, pending messages, upcoming events, unread reviews)
- Recent activity feed
- Quick action buttons
- Calendar widget showing upcoming reservations

---

## Phase 2: High Priority Features

### Events Management
- Table listing all events with status badges (Draft/Published)
- Create/Edit event form with title, description, date, time, location, price
- Image upload placeholder (drag & drop zone)
- Toggle draft/published status
- Delete with confirmation modal

### Special Days Management
- Calendar view highlighting special days
- Add special day form (date picker + name)
- List view with delete option
- Visual indicator of which dates are marked

### Reservations Management
- Table with filters (date range, status: Pending/Confirmed/Completed/Cancelled)
- Search by name, email, or phone
- View reservation details modal
- Update status dropdown
- Export to CSV button (mock functionality)

### High Tea Reservations
- Separate section for High Tea bookings
- Package info display (Standard/Deluxe/Premium with pricing)
- Calendar availability view
- Booking details with dietary requirements
- Package management tab (Admin/Owner only)

### User Management (Admin Only)
- User list table with role badges
- Create user form with role selection
- Edit user modal
- Deactivate/Delete user with confirmation
- Activity log preview

---

## Phase 3: Medium Priority Features

### Menu Management
- Grid layout for menu categories
- Image upload zones per category (Breakfast, Lunch, Drinks, etc.)
- Preview uploaded images
- Replace/Delete functionality

### Contact Settings
- Form for contact info (phone, email, address)
- Social media link inputs (Instagram, Facebook, etc.)
- Opening hours editor (per day)
- Save changes button

### Messages Management
- Inbox-style list with read/unread indicators
- Message preview cards
- Full message view with reply option
- Mark as read/unread toggle
- Delete with confirmation

### Customer Reviews
- List with star ratings display
- Filter by status (Pending/Approved/Rejected) and rating
- Quick approve/reject buttons
- Reply text area
- Feature review toggle

### Photo Gallery
- Grid layout with category tabs
- Upload multiple images (drag & drop)
- Caption editor
- Drag to reorder (visual mock)
- Delete with confirmation

---

## Phase 4: Low Priority Features

### Site Settings
- Site name and tagline inputs
- About Us content editor (rich text area)
- SEO settings placeholder

### Analytics Dashboard
- Charts showing reservation trends (using Recharts)
- Popular time slots visualization
- Message response times
- Review ratings distribution

---

## Design Specifications

### Visual Style
- Clean, professional admin aesthetic
- Coffee-themed accent colors (warm browns, cream backgrounds)
- Clear typography with good hierarchy
- Consistent card-based layouts
- Subtle shadows and rounded corners

### Role-Based UI
- Navigation items show/hide based on current role
- "Access Denied" placeholder pages for restricted sections
- Visual cues indicating permission levels
- Role badge in header

### Responsive Design
- Collapsible sidebar on tablet/mobile
- Stacked cards on smaller screens
- Touch-friendly buttons and controls

---

## Mock Data Structure

All data will be stored in local React state or mock JSON files, structured to match your planned MySQL schema. This ensures easy transition when connecting to the real PHP API later.

---

## Future Integration Notes

After the frontend is complete, I'll provide guidance on:
1. PHP REST API endpoint structure
2. CORS configuration for cross-origin requests
3. Authentication token flow
4. How to replace mock data with API calls

---

**Estimated Implementation**: 4-5 development sessions  
**Result**: Fully functional admin UI ready for backend integration

