<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="max-w-4xl mx-auto">
                        <!-- Header -->
                        <div class="text-center mb-12">
                            <h1 class="text-4xl font-bold text-gray-900 dark:text-gray-100 mb-4">Get in Touch</h1>
                            <p class="text-xl text-gray-600 dark:text-gray-400">We'd love to hear from you. Send us a message and we'll respond as soon as possible.</p>
                        </div>

                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                            <!-- Contact Form -->
                            <div>
                                <h2 class="text-2xl font-semibold text-gray-900 dark:text-gray-100 mb-6">Send us a Message</h2>
                                <form class="space-y-6">
                                    <div>
                                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Full Name</label>
                                        <input type="text" id="name" name="name" class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Your full name">
                                    </div>
                                    <div>
                                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Email Address</label>
                                        <input type="email" id="email" name="email" class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="your.email@example.com">
                                    </div>
                                    <div>
                                        <label for="subject" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Subject</label>
                                        <select id="subject" name="subject" class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                            <option value="">Select a subject</option>
                                            <option value="general">General Inquiry</option>
                                            <option value="support">Technical Support</option>
                                            <option value="billing">Billing Question</option>
                                            <option value="feature">Feature Request</option>
                                            <option value="bug">Bug Report</option>
                                            <option value="partnership">Partnership</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="message" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Message</label>
                                        <textarea id="message" name="message" rows="6" class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Tell us how we can help you..."></textarea>
                                    </div>
                                    <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-medium py-3 px-6 rounded-lg transition-colors duration-200">
                                        Send Message
                                    </button>
                                </form>
                            </div>

                            <!-- Contact Information -->
                            <div>
                                <h2 class="text-2xl font-semibold text-gray-900 dark:text-gray-100 mb-6">Contact Information</h2>
                                
                                <!-- Contact Methods -->
                                <div class="space-y-6 mb-8">
                                    <div class="flex items-start space-x-4">
                                        <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900 rounded-lg flex items-center justify-center flex-shrink-0">
                                            <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Email Support</h3>
                                            <p class="text-gray-600 dark:text-gray-400 mb-1">Get help via email</p>
                                            <a href="mailto:support@quickchat.com" class="text-blue-500 hover:text-blue-600 dark:text-blue-400 dark:hover:text-blue-300">support@quickchat.com</a>
                                        </div>
                                    </div>

                                    <div class="flex items-start space-x-4">
                                        <div class="w-12 h-12 bg-green-100 dark:bg-green-900 rounded-lg flex items-center justify-center flex-shrink-0">
                                            <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Phone Support</h3>
                                            <p class="text-gray-600 dark:text-gray-400 mb-1">Call us for immediate assistance</p>
                                            <a href="tel:+15551234567" class="text-blue-500 hover:text-blue-600 dark:text-blue-400 dark:hover:text-blue-300">+1 (555) 123-4567</a>
                                        </div>
                                    </div>

                                    <div class="flex items-start space-x-4">
                                        <div class="w-12 h-12 bg-purple-100 dark:bg-purple-900 rounded-lg flex items-center justify-center flex-shrink-0">
                                            <svg class="w-6 h-6 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Office Address</h3>
                                            <p class="text-gray-600 dark:text-gray-400 mb-1">Visit our headquarters</p>
                                            <address class="text-gray-600 dark:text-gray-400 not-italic">123 Tech Street<br>Digital City, DC 12345<br>United States</address>
                                        </div>
                                    </div>

                                    <div class="flex items-start space-x-4">
                                        <div class="w-12 h-12 bg-orange-100 dark:bg-orange-900 rounded-lg flex items-center justify-center flex-shrink-0">
                                            <svg class="w-6 h-6 text-orange-600 dark:text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Business Hours</h3>
                                            <p class="text-gray-600 dark:text-gray-400 mb-1">When we're available</p>
                                            <p class="text-gray-600 dark:text-gray-400">Monday - Friday: 9:00 AM - 6:00 PM<br>Saturday: 10:00 AM - 4:00 PM<br>Sunday: Closed</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- FAQ Link -->
                                <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-3">Frequently Asked Questions</h3>
                                    <p class="text-gray-600 dark:text-gray-400 mb-4">Looking for quick answers? Check out our FAQ section for common questions and solutions.</p>
                                    <a href="/faq" class="inline-flex items-center text-blue-500 hover:text-blue-600 dark:text-blue-400 dark:hover:text-blue-300 font-medium">
                                        View FAQ
                                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Social Media -->
                        <div class="mt-12 text-center">
                            <h2 class="text-2xl font-semibold text-gray-900 dark:text-gray-100 mb-6">Follow Us</h2>
                            <div class="flex justify-center space-x-6">
                                <a href="#" class="w-12 h-12 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center hover:bg-blue-500 hover:text-white transition-colors duration-200">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                                    </svg>
                                </a>
                                <a href="#" class="w-12 h-12 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center hover:bg-blue-500 hover:text-white transition-colors duration-200">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z"/>
                                    </svg>
                                </a>
                                <a href="#" class="w-12 h-12 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center hover:bg-blue-500 hover:text-white transition-colors duration-200">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
