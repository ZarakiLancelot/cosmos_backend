<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240816084106 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE detail (id INT AUTO_INCREMENT NOT NULL, summary_id INT NOT NULL, user_id INT NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, age INT NOT NULL, gender VARCHAR(10) NOT NULL, email VARCHAR(255) DEFAULT NULL, phone VARCHAR(255) DEFAULT NULL, usename VARCHAR(100) DEFAULT NULL, password VARCHAR(100) DEFAULT NULL, birth_date DATE NOT NULL, image VARCHAR(255) DEFAULT NULL, blood_group VARCHAR(5) DEFAULT NULL, height DOUBLE PRECISION DEFAULT NULL, weight DOUBLE PRECISION DEFAULT NULL, eye_color VARCHAR(16) DEFAULT NULL, hair_color VARCHAR(16) DEFAULT NULL, hair_type VARCHAR(16) DEFAULT NULL, ip VARCHAR(20) DEFAULT NULL, address VARCHAR(255) NOT NULL, city VARCHAR(50) NOT NULL, state VARCHAR(50) NOT NULL, state_code VARCHAR(5) NOT NULL, postal_code VARCHAR(10) DEFAULT NULL, coordinates_lat DOUBLE PRECISION DEFAULT NULL, coordinates_lng DOUBLE PRECISION DEFAULT NULL, country VARCHAR(50) DEFAULT NULL, mac_address VARCHAR(50) DEFAULT NULL, university VARCHAR(255) DEFAULT NULL, bank_card_expire VARCHAR(10) DEFAULT NULL, bank_card_number VARCHAR(50) DEFAULT NULL, bank_card_type VARCHAR(20) DEFAULT NULL, bank_currency VARCHAR(5) DEFAULT NULL, bank_iban VARCHAR(50) DEFAULT NULL, company_department VARCHAR(100) DEFAULT NULL, company_name VARCHAR(100) DEFAULT NULL, company_title VARCHAR(100) DEFAULT NULL, company_address VARCHAR(100) DEFAULT NULL, company_city VARCHAR(100) DEFAULT NULL, company_state VARCHAR(100) DEFAULT NULL, company_state_code VARCHAR(5) DEFAULT NULL, company_postal_code VARCHAR(20) DEFAULT NULL, company_coordinates_lat DOUBLE PRECISION DEFAULT NULL, company_coordinates_lng DOUBLE PRECISION DEFAULT NULL, company_country VARCHAR(100) DEFAULT NULL, ein VARCHAR(50) DEFAULT NULL, ssn VARCHAR(50) DEFAULT NULL, user_agent VARCHAR(255) DEFAULT NULL, crypto_coin VARCHAR(50) DEFAULT NULL, crypto_wallet VARCHAR(255) DEFAULT NULL, crypto_network VARCHAR(100) DEFAULT NULL, role VARCHAR(20) NOT NULL, INDEX IDX_2E067F932AC2D45C (summary_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE summary (id INT AUTO_INCREMENT NOT NULL, date DATE NOT NULL, total_records INT NOT NULL, gender_distribution JSON NOT NULL, age_distribution JSON NOT NULL, city_distribution JSON NOT NULL, so_distribution JSON NOT NULL, filename VARCHAR(255) NOT NULL, created_at DATE NOT NULL, updated_at DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE detail ADD CONSTRAINT FK_2E067F932AC2D45C FOREIGN KEY (summary_id) REFERENCES summary (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE detail DROP FOREIGN KEY FK_2E067F932AC2D45C');
        $this->addSql('DROP TABLE detail');
        $this->addSql('DROP TABLE summary');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
