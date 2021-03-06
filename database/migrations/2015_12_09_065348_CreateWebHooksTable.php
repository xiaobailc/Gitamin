<?php

/*
 * This file is part of Gitamin.
 *
 * Copyright (C) 2015-2016 The Gitamin Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebHooksTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('web_hooks', function (Blueprint $t) {
            $t->engine = 'InnoDB';

            $t->increments('id');
            $t->string('url');
            $t->integer('project_id');
            $t->timestamps();
            $t->string('type')->default('ProjectHook');
            $t->integer('service_id');
            $t->boolean('push_events')->default(true);
            $t->boolean('issues_events')->default(false);
            $t->boolean('pull_requests_events')->default(false);
            $t->boolean('tag_push_events')->default(false);
            $t->boolean('comment_events')->default(false);
            $t->boolean('enable_ssl_verification')->default(true);

            $t->softDeletes();

            $t->index(['created_at', 'id']);
            $t->index('project_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('web_hooks');
    }
}
