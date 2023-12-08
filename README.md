## About  Assessment
<!-- Product Data Importer Assessment -->

<h1>Product Data Importer</h1>

<p>This Laravel application, titled "Product Data Importer with User Interface," is designed to fetch and display products from the <a href="https://dummyjson.com/products" target="_blank">DummyJSON.com API</a>. The primary objective is to create a robust system with various features and functionalities.</p>

<!-- Objective -->

<h2>Objective</h2>

<p>Develop a Laravel application to seamlessly fetch product data from the DummyJSON.com API and provide a user-friendly interface for displaying and managing the information.</p>

<!-- Key Requirements -->

<h2>Key Requirements</h2>

<ol>
  <li><strong>Scheduled Data Fetching:</strong>
    <ul>
      <li>Utilize the Laravel task scheduler to automatically fetch product data from the DummyJSON.com API every 2 hours.</li>
    </ul>
  </li>

  <li><strong>API Pagination:</strong>
    <ul>
      <li>Implement API pagination to fetch 10 products per request, covering the first 3 pages.</li>
    </ul>
  </li>

  <li><strong>Database Storage:</strong>
    <ul>
      <li>Employ MySQL as the database to store essential product details, including ID, name, description, price, etc.</li>
    </ul>
  </li>

  <li><strong>Error Handling:</strong>
    <ul>
      <li>Implement a robust error handling mechanism for API interactions and data processing to ensure a smooth user experience.</li>
    </ul>
  </li>

  <li><strong>Data Update Mechanism:</strong>
    <ul>
      <li>Develop a mechanism to update existing database entries, preventing duplicates and ensuring data accuracy.</li>
    </ul>
  </li>

  <li><strong>User Authentication:</strong>
    <ul>
      <li>Create a comprehensive system for user registration, login, and logout to secure the application and provide personalized experiences.</li>
    </ul>
  </li>

  <li><strong>Product Display:</strong>
    <ul>
      <li>Implement a paginated display specifically for authenticated users, showcasing 5 products per page. This enhances the user experience and ensures efficient navigation.</li>
    </ul>
  </li>
</ol>

<!-- Getting Started -->

<h2>Getting Started</h2>

<ol>
  <li>Clone the repository to your local machine:
    <pre><code>git clone https://github.com/brainiakk/pdi.git</code></pre>
  </li>

  <li>Navigate to the project directory:
    <pre><code>cd pdi</code></pre>
  </li>

  <li>Install the project dependencies:
    <pre><code>composer install</code></pre>
  </li>

  <li>Configure your <code>.env</code> file with the necessary database and API credentials.</li>

  <li>Run database migrations:
    <pre><code>php artisan migrate</code></pre>
  </li>

  <li>Set up Laravel task scheduling:
    <pre><code>crontab -e</code></pre>
    Add the following cron job to run the task scheduler:
    <pre><code>* * * * * cd /path-to-your-project && php artisan schedule:run &gt;&gt; /dev/null 2&gt;&amp;1</code></pre>
  </li>

  <li>Serve the application:
    <pre><code>php artisan serve</code></pre>
  </li>

  <li>Access the application in your web browser:
    <pre><code>http://localhost:8000</code></pre>
  </li>
</ol>

<!-- Additional Notes -->

<h2>Additional Notes</h2>

<ul>
  <li>Customize the user interface, design, and styling based on your project requirements.</li>
  <li>Ensure that the Laravel application is hosted on a server that supports scheduled tasks for optimal data fetching.</li>
  <li>Regularly check the application logs for any errors or issues related to data fetching, processing, and storage.</li>
</ul>

<p>Feel free to extend and enhance the application based on your specific needs and additional features you may want to incorporate.</p>
