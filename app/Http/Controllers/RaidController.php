<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RaidController extends Controller
{
    public function raidLeaderOnly(){
        return response()->json(['message' => 'Raid Leader Only Page']);
    }

    public function sharedAccessRoute(){
        return response()->json(['message' => 'Shared Access Page']);
    }

    public function commonRoute(Request $request)
    {
        $raidGroupId = $request->session()->get('raid_group_id');

        // Assuming you have a method to fetch data based on RaidGroupID
        $data = $this->getDataForRaidGroup($raidGroupId);

        return response()->json([
            'message' => 'Data for Raid Group ' . $raidGroupId,
            'data' => $data // Replace with actual data
        ]);
    }

    private function getDataForRaidGroup($raidGroupId)
    {
        // Implement logic to fetch and return data specific to the RaidGroupID
        // This is just a placeholder, replace it with your actual data fetching logic
        return ['info' => 'Specific info for Raid Group ' . $raidGroupId];
    }
}
