import React, { useState } from 'react';
import { Link, useLocation, useNavigate } from 'react-router-dom';
import { useAuth, UserRole } from '@/contexts/AuthContext';
import { Button } from '@/components/ui/button';
import { Avatar, AvatarFallback } from '@/components/ui/avatar';
import {
  DropdownMenu,
  DropdownMenuContent,
  DropdownMenuItem,
  DropdownMenuLabel,
  DropdownMenuSeparator,
  DropdownMenuTrigger,
} from '@/components/ui/dropdown-menu';
import { Badge } from '@/components/ui/badge';
import {
  LayoutDashboard,
  Calendar,
  CalendarDays,
  UtensilsCrossed,
  Users,
  MessageSquare,
  Star,
  Image,
  Settings,
  Coffee,
  Menu,
  X,
  Bell,
  LogOut,
  ChevronLeft,
  ChevronRight,
  PartyPopper,
} from 'lucide-react';
import { cn } from '@/lib/utils';

interface NavItem {
  label: string;
  href: string;
  icon: React.ReactNode;
  requiredRoles?: UserRole[];
  badge?: number;
}

const navItems: NavItem[] = [
  { label: 'Dashboard', href: '/admin', icon: <LayoutDashboard className="h-5 w-5" /> },
  { label: 'Reservations', href: '/admin/reservations', icon: <Calendar className="h-5 w-5" /> },
  { label: 'High Tea', href: '/admin/high-tea', icon: <Coffee className="h-5 w-5" /> },
  { label: 'Events', href: '/admin/events', icon: <PartyPopper className="h-5 w-5" /> },
  { label: 'Special Days', href: '/admin/special-days', icon: <CalendarDays className="h-5 w-5" /> },
  { label: 'Menu', href: '/admin/menu', icon: <UtensilsCrossed className="h-5 w-5" /> },
  { label: 'Messages', href: '/admin/messages', icon: <MessageSquare className="h-5 w-5" />, badge: 2 },
  { label: 'Reviews', href: '/admin/reviews', icon: <Star className="h-5 w-5" /> },
  { label: 'Gallery', href: '/admin/gallery', icon: <Image className="h-5 w-5" /> },
  { label: 'Users', href: '/admin/users', icon: <Users className="h-5 w-5" />, requiredRoles: ['admin'] },
  { label: 'Settings', href: '/admin/settings', icon: <Settings className="h-5 w-5" /> },
];

const roleColors: Record<UserRole, string> = {
  admin: 'bg-destructive text-destructive-foreground',
  owner: 'bg-primary text-primary-foreground',
  manager: 'bg-secondary text-secondary-foreground',
};

interface AdminLayoutProps {
  children: React.ReactNode;
}

const AdminLayout: React.FC<AdminLayoutProps> = ({ children }) => {
  const { user, logout, hasPermission } = useAuth();
  const location = useLocation();
  const navigate = useNavigate();
  const [sidebarOpen, setSidebarOpen] = useState(true);
  const [mobileMenuOpen, setMobileMenuOpen] = useState(false);

  const handleLogout = () => {
    logout();
    navigate('/login');
  };

  const filteredNavItems = navItems.filter(
    item => !item.requiredRoles || hasPermission(item.requiredRoles)
  );

  return (
    <div className="min-h-screen bg-background">
      {/* Mobile Header */}
      <header className="lg:hidden fixed top-0 left-0 right-0 z-50 bg-sidebar border-b border-sidebar-border">
        <div className="flex items-center justify-between px-4 h-16">
          <div className="flex items-center gap-3">
            <Button
              variant="ghost"
              size="icon"
              onClick={() => setMobileMenuOpen(!mobileMenuOpen)}
              className="text-sidebar-foreground hover:bg-sidebar-accent"
            >
              {mobileMenuOpen ? <X className="h-6 w-6" /> : <Menu className="h-6 w-6" />}
            </Button>
            <div className="flex items-center gap-2">
              <Coffee className="h-6 w-6 text-sidebar-primary" />
              <span className="font-semibold text-sidebar-foreground">BLVD Admin</span>
            </div>
          </div>
          <div className="flex items-center gap-2">
            <Button variant="ghost" size="icon" className="text-sidebar-foreground hover:bg-sidebar-accent">
              <Bell className="h-5 w-5" />
            </Button>
          </div>
        </div>
      </header>

      {/* Mobile Menu Overlay */}
      {mobileMenuOpen && (
        <div
          className="lg:hidden fixed inset-0 z-40 bg-black/50"
          onClick={() => setMobileMenuOpen(false)}
        />
      )}

      {/* Sidebar */}
      <aside
        className={cn(
          'fixed top-0 left-0 z-50 h-full bg-sidebar border-r border-sidebar-border transition-all duration-300',
          sidebarOpen ? 'w-64' : 'w-20',
          mobileMenuOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'
        )}
      >
        {/* Logo */}
        <div className="flex items-center gap-3 px-4 h-16 border-b border-sidebar-border">
          <Coffee className="h-8 w-8 text-sidebar-primary shrink-0" />
          {sidebarOpen && (
            <div className="overflow-hidden">
              <h1 className="font-bold text-sidebar-foreground text-lg">BLVD Coffee</h1>
              <p className="text-xs text-sidebar-foreground/60">Admin Panel</p>
            </div>
          )}
        </div>

        {/* Navigation */}
        <nav className="flex-1 overflow-y-auto py-4 scrollbar-thin">
          <ul className="space-y-1 px-3">
            {filteredNavItems.map((item) => {
              const isActive = location.pathname === item.href;
              return (
                <li key={item.href}>
                  <Link
                    to={item.href}
                    onClick={() => setMobileMenuOpen(false)}
                    className={cn(
                      'flex items-center gap-3 px-3 py-2.5 rounded-md transition-colors relative',
                      isActive
                        ? 'bg-sidebar-accent text-sidebar-primary'
                        : 'text-sidebar-foreground/80 hover:bg-sidebar-accent hover:text-sidebar-accent-foreground'
                    )}
                  >
                    {item.icon}
                    {sidebarOpen && (
                      <>
                        <span className="flex-1">{item.label}</span>
                        {item.badge && (
                          <Badge variant="destructive" className="h-5 min-w-[20px] flex items-center justify-center text-xs">
                            {item.badge}
                          </Badge>
                        )}
                      </>
                    )}
                    {!sidebarOpen && item.badge && (
                      <span className="absolute -top-1 -right-1 h-4 w-4 bg-destructive rounded-full text-[10px] text-destructive-foreground flex items-center justify-center">
                        {item.badge}
                      </span>
                    )}
                  </Link>
                </li>
              );
            })}
          </ul>
        </nav>

        {/* User Section */}
        <div className="border-t border-sidebar-border p-3">
          {user && (
            <div className={cn('flex items-center gap-3', !sidebarOpen && 'justify-center')}>
              <Avatar className="h-10 w-10 shrink-0">
                <AvatarFallback className="bg-sidebar-accent text-sidebar-accent-foreground">
                  {user.name.split(' ').map(n => n[0]).join('')}
                </AvatarFallback>
              </Avatar>
              {sidebarOpen && (
                <div className="flex-1 min-w-0">
                  <p className="text-sm font-medium text-sidebar-foreground truncate">{user.name}</p>
                  <Badge className={cn('text-xs capitalize', roleColors[user.role])}>
                    {user.role}
                  </Badge>
                </div>
              )}
            </div>
          )}
        </div>

        {/* Collapse Toggle (Desktop only) */}
        <Button
          variant="ghost"
          size="icon"
          onClick={() => setSidebarOpen(!sidebarOpen)}
          className="hidden lg:flex absolute -right-3 top-20 h-6 w-6 rounded-full border border-sidebar-border bg-sidebar text-sidebar-foreground hover:bg-sidebar-accent"
        >
          {sidebarOpen ? <ChevronLeft className="h-4 w-4" /> : <ChevronRight className="h-4 w-4" />}
        </Button>
      </aside>

      {/* Main Content */}
      <div className={cn(
        'transition-all duration-300',
        sidebarOpen ? 'lg:ml-64' : 'lg:ml-20'
      )}>
        {/* Desktop Header */}
        <header className="hidden lg:flex sticky top-0 z-40 h-16 items-center justify-between border-b bg-card px-6">
          <div>
            <h2 className="text-lg font-semibold text-foreground">
              {navItems.find(item => item.href === location.pathname)?.label || 'Dashboard'}
            </h2>
          </div>
          <div className="flex items-center gap-4">
            <Button variant="ghost" size="icon" className="relative">
              <Bell className="h-5 w-5" />
              <span className="absolute -top-1 -right-1 h-4 w-4 bg-destructive rounded-full text-[10px] text-destructive-foreground flex items-center justify-center">
                3
              </span>
            </Button>
            <DropdownMenu>
              <DropdownMenuTrigger asChild>
                <Button variant="ghost" className="flex items-center gap-2">
                  <Avatar className="h-8 w-8">
                    <AvatarFallback>
                      {user?.name.split(' ').map(n => n[0]).join('')}
                    </AvatarFallback>
                  </Avatar>
                  <span className="hidden md:inline">{user?.name}</span>
                </Button>
              </DropdownMenuTrigger>
              <DropdownMenuContent align="end" className="w-56">
                <DropdownMenuLabel>
                  <div>
                    <p>{user?.name}</p>
                    <p className="text-xs text-muted-foreground">{user?.email}</p>
                  </div>
                </DropdownMenuLabel>
                <DropdownMenuSeparator />
                <DropdownMenuItem>
                  <Settings className="mr-2 h-4 w-4" />
                  Settings
                </DropdownMenuItem>
                <DropdownMenuSeparator />
                <DropdownMenuItem onClick={handleLogout} className="text-destructive">
                  <LogOut className="mr-2 h-4 w-4" />
                  Logout
                </DropdownMenuItem>
              </DropdownMenuContent>
            </DropdownMenu>
          </div>
        </header>

        {/* Page Content */}
        <main className="p-4 lg:p-6 pt-20 lg:pt-6">
          {children}
        </main>
      </div>
    </div>
  );
};

export default AdminLayout;
