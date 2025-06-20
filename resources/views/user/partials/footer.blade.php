<!-- FOOTER -->
<footer class="bg-gray-800 text-white mt-16">
    <div class="max-w-7xl mx-auto py-12 px-6 sm:px-8 grid grid-cols-1 md:grid-cols-4 gap-8">
        
        <!-- Logo + Description -->
        <div>
            <h3 class="text-2xl font-bold text-green-400 mb-2">AgriCentral</h3>
            <p class="text-sm text-gray-300">Empowering farmers with technology, knowledge, and access to organic farming tools and resources.</p>
        </div>

        <!-- Quick Links -->
        <div>
            <h4 class="text-lg font-semibold mb-3">Quick Links</h4>
            <ul class="space-y-2 text-sm text-gray-300">
                <li><a href="{{ route('user.home') }}" class="hover:text-green-300">Home</a></li>
                <li><a href="{{ route('user.marketprice') }}" class="hover:text-green-300">Market View</a></li>
                <li><a href="{{ route('about') }}" class="hover:text-green-300">About Us</a></li>
                <li><a href="{{ route('user.shop') }}" class="hover:text-green-300">Shop</a></li>
            </ul>
        </div>

        <!-- Contact Information -->
        <div>
            <h4 class="text-lg font-semibold mb-3">Contact Us</h4>
            <ul class="text-sm text-gray-300 space-y-2">
                <li>Email: support@agricentral.com</li>
                <li>Phone: +91 98765 43210</li>
                <li>Location: Rajkot, Gujarat, India</li>
            </ul>
        </div>

        <!-- Newsletter / Social -->
        <div>
            <h4 class="text-lg font-semibold mb-3">Newsletter</h4>
            <form>
                <input type="email" placeholder="Enter your email" class="w-full p-2 text-black rounded mb-2" />
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Subscribe</button>
            </form>

            <div class="mt-4 flex space-x-4">
                <a href="#" class="hover:text-green-400">
                    <i class="fab fa-facebook-f"></i> <!-- Add fontawesome -->
                </a>
                <a href="#" class="hover:text-green-400">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="hover:text-green-400">
                    <i class="fab fa-youtube"></i>
                </a>
                <a href="#" class="hover:text-green-400">
                    <i class="fab fa-instagram"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="text-center py-4 bg-gray-900 text-gray-400 text-sm">
        © {{ now()->year }} AgriCentral. All rights reserved.
    </div>
</footer>
