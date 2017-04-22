<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170409231315 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE breed ADD image VARCHAR(225) DEFAULT NULL');
//        $this->addSql('ALTER TABLE user CHANGE enabled enabled TINYINT(1) NOT NULL, CHANGE salt salt VARCHAR(255) NOT NULL, CHANGE locked locked TINYINT(1) NOT NULL, CHANGE expired expired TINYINT(1) NOT NULL, CHANGE roles roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', CHANGE credentials_expired credentials_expired TINYINT(1) NOT NULL');
//        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D64992FC23A8 ON user (username_canonical)');
//        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649A0D96FBF ON user (email_canonical)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE breed DROP image');
//        $this->addSql('DROP INDEX UNIQ_8D93D64992FC23A8 ON user');
//        $this->addSql('DROP INDEX UNIQ_8D93D649A0D96FBF ON user');
//        $this->addSql('ALTER TABLE user CHANGE enabled enabled TINYINT(1) DEFAULT NULL, CHANGE salt salt VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, CHANGE locked locked TINYINT(1) DEFAULT NULL, CHANGE expired expired TINYINT(1) DEFAULT NULL, CHANGE roles roles LONGTEXT DEFAULT NULL COLLATE utf8_unicode_ci COMMENT \'(DC2Type:array)\', CHANGE credentials_expired credentials_expired TINYINT(1) DEFAULT NULL');
    }
}
