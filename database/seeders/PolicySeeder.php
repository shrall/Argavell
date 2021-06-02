<?php

namespace Database\Seeders;

use App\Models\Policy;
use Illuminate\Database\Seeder;

class PolicySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $policy = new Policy();
        $policy->policy = 'Returned item can only be
            exchanged if the
            seal on the product is
            broken or if you receive a wrong item.';
        $policy->save();

        $policy = new Policy();
        $policy->policy = 'Product must be sent back to
            Argavell 5
            days after the item was
            received.';
        $policy->save();

        $policy = new Policy();
        $policy->policy = 'Customers must contact
            Argavell for
            confirmation of return, by filling
            out the return form attached.';
        $policy->save();

        $policy = new Policy();
        $policy->policy = 'Return confirmation can be
            done at
            Argavell’s call center in the
            following number 082143211310.';
        $policy->save();

        $policy = new Policy();
        $policy->policy = 'Return requests will be
            processed after the
            product received by Argavell.';
        $policy->save();

        $policy = new Policy();
        $policy->policy = 'Estimated return process 1×24
            hours after
            the item is received.';
        $policy->save();

        $policy = new Policy();
        $policy->policy = 'The shipping cost of returning
            product is paid by the customer and
            the shipping costs from Argavell to the customer are borne by
            Argavell.';
        $policy->save();
    }
}
