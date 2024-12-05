# Tracking Nutritional Intakes Based on Reference Daily Intakes

This project is designed to help users track their Nutritional Intake Based on the Recommended Daily Intakes (RDIs). The system calculates and analyzes the nutrients consumed to help users maintain a balanced diet.

## Features :star2:

- :apple: Track daily food intake and calculate nutrient values.
- :clipboard: View personalized nutritional reports and analytics.
- :busts_in_silhouette: User-friendly interface for adding and managing food entries.

## Installation :package:

Follow the steps below to set up the project locally.

### Prerequisites :clipboard:

Ensure you have the following installed:

- PHP >= 8.0 :package:
- MySQL or any compatible database :floppy_disk:
- Apache or Nginx server :triangular_flag_on_post:

### Steps :arrow_down:

1. **Clone the repository:**

    ```bash
    git clone https://github.com/username/tracking-nutritional-intake.git
    cd tracking-nutritional-intake
    ```

2. **Import the database schema:**

    Import the provided SQL file into your database:

    ```bash
    mysql -u your_username -p your_database_name < database/schema.sql
    ```

3. **Serve the application:**

    Use your preferred server configuration to host the application (e.g., XAMPP, WAMP, or LAMP).

    Example with PHP built-in server:

    ```bash
    php -S localhost:8000
    ```

    Access the application at `http://localhost:8000`.

## Usage :wrench:

After setting up, users can:

- Log daily food consumption and view nutrient breakdown. :chart_with_upwards_trend:
- Generate daily meal recommendations  to track progress toward daily goals. :notebook_with_decorative_cover:

## Contributing :handshake:

Contributions are welcome! Follow the steps below to contribute:

1. Fork the repository. :fork_and_knife:
2. Create a new branch: `git checkout -b feature/your-feature-name`. :arrow_right:
3. Commit your changes: `git commit -m 'Add new feature'`. :memo:
4. Push to the branch: `git push origin feature/your-feature-name`. :rocket:
5. Open a pull request for review. :arrow_up:

## License :scroll:

This project is open-source and licensed under the [MIT License](https://opensource.org/licenses/MIT). :lock:
