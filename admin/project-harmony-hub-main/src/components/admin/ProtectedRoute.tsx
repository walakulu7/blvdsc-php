import React from 'react';
import { Navigate, useLocation } from 'react-router-dom';
import { useAuth, UserRole } from '@/contexts/AuthContext';
import AdminLayout from './AdminLayout';
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from '@/components/ui/card';
import { ShieldAlert } from 'lucide-react';

interface ProtectedRouteProps {
  children: React.ReactNode;
  requiredRoles?: UserRole[];
}

const ProtectedRoute: React.FC<ProtectedRouteProps> = ({ children, requiredRoles }) => {
  const { isAuthenticated, hasPermission } = useAuth();
  const location = useLocation();

  if (!isAuthenticated) {
    return <Navigate to="/login" state={{ from: location }} replace />;
  }

  if (requiredRoles && !hasPermission(requiredRoles)) {
    return (
      <AdminLayout>
        <div className="flex items-center justify-center min-h-[60vh]">
          <Card className="max-w-md">
            <CardHeader className="text-center">
              <div className="mx-auto mb-4 p-4 rounded-full bg-destructive/10 w-fit">
                <ShieldAlert className="h-10 w-10 text-destructive" />
              </div>
              <CardTitle>Access Denied</CardTitle>
              <CardDescription>
                You don't have permission to access this page. This section requires{' '}
                {requiredRoles.join(' or ')} role.
              </CardDescription>
            </CardHeader>
            <CardContent className="text-center text-sm text-muted-foreground">
              Please contact your administrator if you believe this is an error.
            </CardContent>
          </Card>
        </div>
      </AdminLayout>
    );
  }

  return <AdminLayout>{children}</AdminLayout>;
};

export default ProtectedRoute;
