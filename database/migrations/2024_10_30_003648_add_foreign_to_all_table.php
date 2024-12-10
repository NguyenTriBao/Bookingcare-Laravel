<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('gender')->references('keyMap')->on('roles')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('roleId')->references('keyMap')->on('roles')->onDelete('cascade')->onUpdate('cascade'); 
        });
        Schema::table('doctors', function (Blueprint $table) {
            $table->foreign('doctorId')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade'); // Liên kết khóa ngoại
            $table->foreign('specialtyId')->references('id')->on('specialties')->onDelete('cascade')->onUpdate('cascade'); // Liên kết khóa ngoại
        });
        Schema::table('histories', function (Blueprint $table) {
            $table->foreign('doctorId')->references('doctorId')->on('doctors')->onDelete('cascade')->onUpdate('cascade'); // Liên kết khóa ngoại
            $table->foreign('patientId')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade'); // Liên kết khóa ngoại
        });
        Schema::table('appointments', function (Blueprint $table) {
            $table->foreign('doctorId')->references('doctorId')->on('doctors')->onDelete('cascade')->onUpdate('cascade'); // Liên kết khóa ngoại
            $table->foreign('patientId')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade'); // Liên kết khóa ngoại
        });
        Schema::table('schedules', function (Blueprint $table) {
            $table->foreign('doctorId')->references('doctorId')->on('doctors')->onDelete('cascade')->onUpdate('cascade'); // Liên kết khóa ngoại
        });
        Schema::table('handbooks', function (Blueprint $table) {
            $table->foreign('author')->references('doctorId')->on('doctors')->onDelete('cascade')->onUpdate('cascade'); // Ràng buộc khóa ngoại
        });
    }
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['gender']);
            $table->dropForeign(['roleId']);
        });
        Schema::table('doctors', function (Blueprint $table) {
            $table->dropForeign(['doctorId']);
            $table->dropForeign(['specialtyId']);
        });
        Schema::table('histories', function (Blueprint $table) {
            $table->dropForeign(['doctorId']);
            $table->dropForeign(['patientId']);
        });
        Schema::table('appointments', function (Blueprint $table) {
            $table->dropForeign(['doctorId']);
            $table->dropForeign(['patientId']);
        });
        Schema::table('schedules', function (Blueprint $table) {
            $table->dropForeign(['doctorId']);
        });
        Schema::table('handbooks', function (Blueprint $table) {
            $table->dropForeign(['author']);
        });
    }
    /**
     * Reverse the migrations.
     */

};