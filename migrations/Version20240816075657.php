<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240816075657 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE notification (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, notification_type VARCHAR(255) NOT NULL, message LONGTEXT NOT NULL, status VARCHAR(255) NOT NULL, sent_at DATETIME NOT NULL, INDEX IDX_BF5476CAA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scan (id INT AUTO_INCREMENT NOT NULL, upload_id INT DEFAULT NULL, ci_upload_id INT NOT NULL, upload_programs_file_id INT DEFAULT 0 NOT NULL, total_scans INT DEFAULT 0 NOT NULL, remaining_scans INT DEFAULT 0 NOT NULL, percentage DOUBLE PRECISION DEFAULT \'0\' NOT NULL, estimated_days_left VARCHAR(255) DEFAULT NULL, repository_id INT DEFAULT 0 NOT NULL, commit_id INT DEFAULT 0 NOT NULL, vulnerabilities_found INT DEFAULT 0 NOT NULL, unaffected_vulnerabilities_found INT DEFAULT 0 NOT NULL, automations_action VARCHAR(45) DEFAULT NULL, policy_engine_action VARCHAR(45) DEFAULT NULL, status VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX idx_upload_id (upload_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE upload (id INT AUTO_INCREMENT NOT NULL, batch_id INT DEFAULT NULL, filename VARCHAR(255) NOT NULL, file_path VARCHAR(255) NOT NULL, upload_date DATETIME NOT NULL, status VARCHAR(255) NOT NULL, file_type VARCHAR(255) NOT NULL, INDEX idx_batch_id (batch_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE upload_batch (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, batch_name VARCHAR(45) NOT NULL, total_received_files INT NOT NULL, total_uploaded_files INT DEFAULT 0 NOT NULL, total_failed_upload INT DEFAULT 0 NOT NULL, total_scanned INT DEFAULT 0 NOT NULL, status VARCHAR(45) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_D1561FCBA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, slack_id VARCHAR(50) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE notification ADD CONSTRAINT FK_BF5476CAA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE scan ADD CONSTRAINT FK_C4B3B3AECCCFBA31 FOREIGN KEY (upload_id) REFERENCES upload (id)');
        $this->addSql('ALTER TABLE upload ADD CONSTRAINT FK_17BDE61FF39EBE7A FOREIGN KEY (batch_id) REFERENCES upload_batch (id)');
        $this->addSql('ALTER TABLE upload_batch ADD CONSTRAINT FK_D1561FCBA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE notification DROP FOREIGN KEY FK_BF5476CAA76ED395');
        $this->addSql('ALTER TABLE scan DROP FOREIGN KEY FK_C4B3B3AECCCFBA31');
        $this->addSql('ALTER TABLE upload DROP FOREIGN KEY FK_17BDE61FF39EBE7A');
        $this->addSql('ALTER TABLE upload_batch DROP FOREIGN KEY FK_D1561FCBA76ED395');
        $this->addSql('DROP TABLE notification');
        $this->addSql('DROP TABLE scan');
        $this->addSql('DROP TABLE upload');
        $this->addSql('DROP TABLE upload_batch');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
