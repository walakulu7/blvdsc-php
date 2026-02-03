import React from 'react';
import { Link } from 'react-router-dom';
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from '@/components/ui/card';
import { Button } from '@/components/ui/button';
import { Badge } from '@/components/ui/badge';
import { Calendar } from '@/components/ui/calendar';
import {
  Calendar as CalendarIcon,
  MessageSquare,
  Star,
  Coffee,
  Plus,
  ArrowRight,
  Users,
  Clock,
  PartyPopper,
} from 'lucide-react';
import { getDashboardStats, mockReservations, mockMessages, mockEvents } from '@/data/mockData';
import { format } from 'date-fns';

const Dashboard: React.FC = () => {
  const stats = getDashboardStats();
  const [selectedDate, setSelectedDate] = React.useState<Date | undefined>(new Date());

  const statCards = [
    {
      title: 'Total Reservations',
      value: stats.totalReservations,
      subtitle: `${stats.pendingReservations} pending`,
      icon: <CalendarIcon className="h-5 w-5" />,
      color: 'text-primary',
      bgColor: 'bg-primary/10',
    },
    {
      title: 'Unread Messages',
      value: stats.unreadMessages,
      subtitle: 'Awaiting response',
      icon: <MessageSquare className="h-5 w-5" />,
      color: 'text-warning',
      bgColor: 'bg-warning/10',
    },
    {
      title: 'Upcoming Events',
      value: stats.upcomingEvents,
      subtitle: 'Published events',
      icon: <PartyPopper className="h-5 w-5" />,
      color: 'text-success',
      bgColor: 'bg-success/10',
    },
    {
      title: 'Pending Reviews',
      value: stats.pendingReviews,
      subtitle: 'Need approval',
      icon: <Star className="h-5 w-5" />,
      color: 'text-destructive',
      bgColor: 'bg-destructive/10',
    },
  ];

  const quickActions = [
    { label: 'New Reservation', href: '/admin/reservations', icon: <Plus className="h-4 w-4" /> },
    { label: 'Add Event', href: '/admin/events', icon: <Plus className="h-4 w-4" /> },
    { label: 'View Messages', href: '/admin/messages', icon: <MessageSquare className="h-4 w-4" /> },
  ];

  const recentActivity = [
    { type: 'reservation', message: 'New reservation from John Smith', time: '2 hours ago' },
    { type: 'message', message: 'New message from James Cooper', time: '4 hours ago' },
    { type: 'review', message: 'New review pending approval', time: '5 hours ago' },
    { type: 'reservation', message: 'Reservation confirmed for Alice Johnson', time: '6 hours ago' },
  ];

  return (
    <div className="space-y-6">
      {/* Stats Grid */}
      <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        {statCards.map((stat) => (
          <Card key={stat.title}>
            <CardContent className="p-6">
              <div className="flex items-start justify-between">
                <div>
                  <p className="text-sm text-muted-foreground">{stat.title}</p>
                  <p className="text-3xl font-bold mt-1">{stat.value}</p>
                  <p className="text-xs text-muted-foreground mt-1">{stat.subtitle}</p>
                </div>
                <div className={`p-3 rounded-lg ${stat.bgColor}`}>
                  <span className={stat.color}>{stat.icon}</span>
                </div>
              </div>
            </CardContent>
          </Card>
        ))}
      </div>

      {/* Quick Actions */}
      <Card>
        <CardHeader className="pb-3">
          <CardTitle className="text-lg">Quick Actions</CardTitle>
        </CardHeader>
        <CardContent>
          <div className="flex flex-wrap gap-2">
            {quickActions.map((action) => (
              <Button key={action.label} variant="outline" asChild>
                <Link to={action.href}>
                  {action.icon}
                  <span className="ml-2">{action.label}</span>
                </Link>
              </Button>
            ))}
          </div>
        </CardContent>
      </Card>

      <div className="grid grid-cols-1 lg:grid-cols-3 gap-6">
        {/* Recent Activity */}
        <Card className="lg:col-span-2">
          <CardHeader>
            <CardTitle className="text-lg">Recent Activity</CardTitle>
            <CardDescription>Latest updates from your admin panel</CardDescription>
          </CardHeader>
          <CardContent>
            <div className="space-y-4">
              {recentActivity.map((activity, index) => (
                <div key={index} className="flex items-start gap-3 pb-3 border-b last:border-0 last:pb-0">
                  <div className="p-2 rounded-full bg-muted">
                    {activity.type === 'reservation' && <CalendarIcon className="h-4 w-4 text-primary" />}
                    {activity.type === 'message' && <MessageSquare className="h-4 w-4 text-warning" />}
                    {activity.type === 'review' && <Star className="h-4 w-4 text-destructive" />}
                  </div>
                  <div className="flex-1 min-w-0">
                    <p className="text-sm">{activity.message}</p>
                    <p className="text-xs text-muted-foreground flex items-center gap-1 mt-1">
                      <Clock className="h-3 w-3" />
                      {activity.time}
                    </p>
                  </div>
                </div>
              ))}
            </div>
          </CardContent>
        </Card>

        {/* Calendar Widget */}
        <Card>
          <CardHeader>
            <CardTitle className="text-lg">Calendar</CardTitle>
            <CardDescription>Upcoming reservations</CardDescription>
          </CardHeader>
          <CardContent className="flex justify-center">
            <Calendar
              mode="single"
              selected={selectedDate}
              onSelect={setSelectedDate}
              className="rounded-md pointer-events-auto"
            />
          </CardContent>
        </Card>
      </div>

      <div className="grid grid-cols-1 lg:grid-cols-2 gap-6">
        {/* Upcoming Reservations */}
        <Card>
          <CardHeader className="flex flex-row items-center justify-between">
            <div>
              <CardTitle className="text-lg">Upcoming Reservations</CardTitle>
              <CardDescription>Next scheduled bookings</CardDescription>
            </div>
            <Button variant="ghost" size="sm" asChild>
              <Link to="/admin/reservations">
                View All <ArrowRight className="ml-1 h-4 w-4" />
              </Link>
            </Button>
          </CardHeader>
          <CardContent>
            <div className="space-y-3">
              {mockReservations.slice(0, 3).map((reservation) => (
                <div key={reservation.id} className="flex items-center justify-between p-3 bg-muted/50 rounded-lg">
                  <div className="flex items-center gap-3">
                    <div className="p-2 rounded-full bg-primary/10">
                      <Users className="h-4 w-4 text-primary" />
                    </div>
                    <div>
                      <p className="font-medium text-sm">{reservation.customerName}</p>
                      <p className="text-xs text-muted-foreground">
                        {format(new Date(reservation.date), 'MMM d')} at {reservation.time} • {reservation.partySize} guests
                      </p>
                    </div>
                  </div>
                  <Badge variant={reservation.status === 'confirmed' ? 'default' : 'secondary'}>
                    {reservation.status}
                  </Badge>
                </div>
              ))}
            </div>
          </CardContent>
        </Card>

        {/* Upcoming Events */}
        <Card>
          <CardHeader className="flex flex-row items-center justify-between">
            <div>
              <CardTitle className="text-lg">Upcoming Events</CardTitle>
              <CardDescription>Scheduled events</CardDescription>
            </div>
            <Button variant="ghost" size="sm" asChild>
              <Link to="/admin/events">
                View All <ArrowRight className="ml-1 h-4 w-4" />
              </Link>
            </Button>
          </CardHeader>
          <CardContent>
            <div className="space-y-3">
              {mockEvents.filter(e => e.status === 'published').slice(0, 3).map((event) => (
                <div key={event.id} className="flex items-center justify-between p-3 bg-muted/50 rounded-lg">
                  <div className="flex items-center gap-3">
                    <div className="p-2 rounded-full bg-success/10">
                      <PartyPopper className="h-4 w-4 text-success" />
                    </div>
                    <div>
                      <p className="font-medium text-sm">{event.title}</p>
                      <p className="text-xs text-muted-foreground">
                        {format(new Date(event.date), 'MMM d')} at {event.time}
                      </p>
                    </div>
                  </div>
                  {event.price > 0 ? (
                    <Badge variant="outline">${event.price}</Badge>
                  ) : (
                    <Badge variant="secondary">Free</Badge>
                  )}
                </div>
              ))}
            </div>
          </CardContent>
        </Card>
      </div>
    </div>
  );
};

export default Dashboard;
