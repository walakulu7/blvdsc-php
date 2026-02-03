import React from 'react';
import { useLocation } from 'react-router-dom';
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from '@/components/ui/card';
import { Construction } from 'lucide-react';

const Placeholder: React.FC = () => {
  const location = useLocation();
  const pageName = location.pathname.split('/').pop() || 'Page';
  const formattedName = pageName.charAt(0).toUpperCase() + pageName.slice(1).replace(/-/g, ' ');

  return (
    <div className="flex items-center justify-center min-h-[60vh]">
      <Card className="max-w-md text-center">
        <CardHeader>
          <div className="mx-auto mb-4 p-4 rounded-full bg-warning/10 w-fit">
            <Construction className="h-10 w-10 text-warning" />
          </div>
          <CardTitle>{formattedName}</CardTitle>
          <CardDescription>
            This section is coming soon in Phase 2 or later.
          </CardDescription>
        </CardHeader>
        <CardContent className="text-sm text-muted-foreground">
          The mockup for this feature will be implemented in the next development session.
        </CardContent>
      </Card>
    </div>
  );
};

export default Placeholder;
