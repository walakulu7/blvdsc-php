import { Toaster } from "@/components/ui/toaster";
import { Toaster as Sonner } from "@/components/ui/sonner";
import { TooltipProvider } from "@/components/ui/tooltip";
import { QueryClient, QueryClientProvider } from "@tanstack/react-query";
import { BrowserRouter, Routes, Route, Navigate } from "react-router-dom";
import { AuthProvider } from "@/contexts/AuthContext";
import ProtectedRoute from "@/components/admin/ProtectedRoute";
import Login from "./pages/Login";
import Dashboard from "./pages/admin/Dashboard";
import Placeholder from "./pages/admin/Placeholder";
import NotFound from "./pages/NotFound";

const queryClient = new QueryClient();

const App = () => (
  <QueryClientProvider client={queryClient}>
    <TooltipProvider>
      <AuthProvider>
        <Toaster />
        <Sonner />
        <BrowserRouter>
          <Routes>
            {/* Redirect root to login */}
            <Route path="/" element={<Navigate to="/login" replace />} />
            
            {/* Public routes */}
            <Route path="/login" element={<Login />} />
            
            {/* Protected admin routes */}
            <Route path="/admin" element={<ProtectedRoute><Dashboard /></ProtectedRoute>} />
            <Route path="/admin/reservations" element={<ProtectedRoute><Placeholder /></ProtectedRoute>} />
            <Route path="/admin/high-tea" element={<ProtectedRoute><Placeholder /></ProtectedRoute>} />
            <Route path="/admin/events" element={<ProtectedRoute><Placeholder /></ProtectedRoute>} />
            <Route path="/admin/special-days" element={<ProtectedRoute><Placeholder /></ProtectedRoute>} />
            <Route path="/admin/menu" element={<ProtectedRoute><Placeholder /></ProtectedRoute>} />
            <Route path="/admin/messages" element={<ProtectedRoute><Placeholder /></ProtectedRoute>} />
            <Route path="/admin/reviews" element={<ProtectedRoute><Placeholder /></ProtectedRoute>} />
            <Route path="/admin/gallery" element={<ProtectedRoute><Placeholder /></ProtectedRoute>} />
            <Route path="/admin/settings" element={<ProtectedRoute><Placeholder /></ProtectedRoute>} />
            
            {/* Admin-only routes */}
            <Route 
              path="/admin/users" 
              element={
                <ProtectedRoute requiredRoles={['admin']}>
                  <Placeholder />
                </ProtectedRoute>
              } 
            />
            
            {/* Catch-all */}
            <Route path="*" element={<NotFound />} />
          </Routes>
        </BrowserRouter>
      </AuthProvider>
    </TooltipProvider>
  </QueryClientProvider>
);

export default App;
