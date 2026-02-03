import React, { createContext, useContext, useState, useCallback } from 'react';

export type UserRole = 'admin' | 'owner' | 'manager';

export interface User {
  id: string;
  name: string;
  email: string;
  role: UserRole;
  avatar?: string;
}

interface AuthContextType {
  user: User | null;
  isAuthenticated: boolean;
  login: (role: UserRole) => void;
  logout: () => void;
  hasPermission: (requiredRoles: UserRole[]) => boolean;
}

const mockUsers: Record<UserRole, User> = {
  admin: {
    id: '1',
    name: 'Sarah Admin',
    email: 'admin@blvd.coffee',
    role: 'admin',
  },
  owner: {
    id: '2',
    name: 'Michael Owner',
    email: 'owner@blvd.coffee',
    role: 'owner',
  },
  manager: {
    id: '3',
    name: 'Emily Manager',
    email: 'manager@blvd.coffee',
    role: 'manager',
  },
};

const AuthContext = createContext<AuthContextType | undefined>(undefined);

export const AuthProvider: React.FC<{ children: React.ReactNode }> = ({ children }) => {
  const [user, setUser] = useState<User | null>(null);

  const login = useCallback((role: UserRole) => {
    setUser(mockUsers[role]);
  }, []);

  const logout = useCallback(() => {
    setUser(null);
  }, []);

  const hasPermission = useCallback((requiredRoles: UserRole[]) => {
    if (!user) return false;
    return requiredRoles.includes(user.role);
  }, [user]);

  return (
    <AuthContext.Provider
      value={{
        user,
        isAuthenticated: !!user,
        login,
        logout,
        hasPermission,
      }}
    >
      {children}
    </AuthContext.Provider>
  );
};

export const useAuth = () => {
  const context = useContext(AuthContext);
  if (context === undefined) {
    throw new Error('useAuth must be used within an AuthProvider');
  }
  return context;
};
