import React from 'react';
import { useNavigate } from 'react-router-dom';
import { useAuth, UserRole } from '@/contexts/AuthContext';
import { Button } from '@/components/ui/button';
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from '@/components/ui/card';
import { Coffee, Shield, Crown, UserCog } from 'lucide-react';

const Login: React.FC = () => {
  const { login } = useAuth();
  const navigate = useNavigate();

  const handleLogin = (role: UserRole) => {
    login(role);
    navigate('/admin');
  };

  const roleButtons: { role: UserRole; label: string; description: string; icon: React.ReactNode; color: string }[] = [
    {
      role: 'admin',
      label: 'Admin',
      description: 'Full system access including user management',
      icon: <Shield className="h-6 w-6" />,
      color: 'bg-destructive hover:bg-destructive/90 text-destructive-foreground',
    },
    {
      role: 'owner',
      label: 'Owner',
      description: 'Business management and reporting access',
      icon: <Crown className="h-6 w-6" />,
      color: 'bg-primary hover:bg-primary/90 text-primary-foreground',
    },
    {
      role: 'manager',
      label: 'Manager',
      description: 'Daily operations and content management',
      icon: <UserCog className="h-6 w-6" />,
      color: 'bg-secondary hover:bg-secondary/80 text-secondary-foreground',
    },
  ];

  return (
    <div className="min-h-screen flex items-center justify-center bg-gradient-to-br from-background via-accent/20 to-background p-4">
      <div className="w-full max-w-md">
        {/* Logo */}
        <div className="text-center mb-8">
          <div className="inline-flex items-center justify-center w-20 h-20 rounded-full bg-primary/10 mb-4">
            <Coffee className="h-10 w-10 text-primary" />
          </div>
          <h1 className="text-3xl font-bold text-foreground">BLVD Coffee</h1>
          <p className="text-muted-foreground mt-1">Admin Panel</p>
        </div>

        {/* Login Card */}
        <Card className="shadow-lg">
          <CardHeader className="text-center">
            <CardTitle className="text-xl">Welcome Back</CardTitle>
            <CardDescription>
              Select a role to login and explore the admin panel
            </CardDescription>
          </CardHeader>
          <CardContent className="space-y-3">
            {roleButtons.map(({ role, label, description, icon, color }) => (
              <Button
                key={role}
                onClick={() => handleLogin(role)}
                className={`w-full h-auto py-4 flex items-start gap-4 justify-start ${color}`}
              >
                <div className="shrink-0">{icon}</div>
                <div className="text-left">
                  <p className="font-semibold">Login as {label}</p>
                  <p className="text-xs opacity-80 font-normal">{description}</p>
                </div>
              </Button>
            ))}
          </CardContent>
        </Card>

        {/* Footer */}
        <p className="text-center text-sm text-muted-foreground mt-6">
          This is a mockup admin panel. Select any role to explore.
        </p>
      </div>
    </div>
  );
};

export default Login;
