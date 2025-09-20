import './bootstrap';

import Alpine from 'alpinejs';

// Make Alpine available globally
window.Alpine = Alpine;

// Start Alpine
Alpine.start();

// Custom Alpine directives and components can be added here
document.addEventListener('alpine:init', () => {
    // Custom Alpine data components
    Alpine.data('dropdown', () => ({
        open: false,
        toggle() {
            this.open = !this.open;
        },
        close() {
            this.open = false;
        }
    }));

    Alpine.data('modal', () => ({
        open: false,
        show() {
            this.open = true;
            document.body.style.overflow = 'hidden';
        },
        hide() {
            this.open = false;
            document.body.style.overflow = 'auto';
        }
    }));

    Alpine.data('notification', () => ({
        show: false,
        message: '',
        type: 'info', // info, success, warning, error
        display(message, type = 'info') {
            this.message = message;
            this.type = type;
            this.show = true;
            
            // Auto hide after 5 seconds
            setTimeout(() => {
                this.show = false;
            }, 5000);
        }
    }));

    // Global Dark Mode Store
    Alpine.store('darkMode', {
        isDark: false,
        
        init() {
            // Initialize dark mode from localStorage or system preference
            const savedMode = localStorage.getItem('darkMode');
            if (savedMode !== null) {
                this.isDark = savedMode === 'true';
            } else {
                this.isDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
                localStorage.setItem('darkMode', this.isDark);
            }
            
            // Apply dark mode class to document
            this.applyDarkMode();
            
            // Watch for system theme changes
            window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
                if (localStorage.getItem('darkMode') === null) {
                    this.isDark = e.matches;
                    localStorage.setItem('darkMode', this.isDark);
                    this.applyDarkMode();
                }
            });
        },
        
        toggle() {
            this.isDark = !this.isDark;
            localStorage.setItem('darkMode', this.isDark);
            this.applyDarkMode();
        },
        
        applyDarkMode() {
            if (this.isDark) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        }
    });

    // Dark Mode Store (for backward compatibility)
    Alpine.data('darkModeStore', () => ({
        darkMode: false,
        
        initDarkMode() {
            // Initialize dark mode from localStorage or system preference
            const savedMode = localStorage.getItem('darkMode');
            if (savedMode !== null) {
                this.darkMode = savedMode === 'true';
            } else {
                this.darkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
                localStorage.setItem('darkMode', this.darkMode);
            }
            
            // Watch for system theme changes
            window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
                if (localStorage.getItem('darkMode') === null) {
                    this.darkMode = e.matches;
                    localStorage.setItem('darkMode', this.darkMode);
                }
            });
        },
        
        toggleDarkMode() {
            this.darkMode = !this.darkMode;
            localStorage.setItem('darkMode', this.darkMode);
        }
    }));
});
