using UnityEngine;
using System.Collections;
using UnityEditor;


[CustomEditor (typeof (MapGenerator))]
public class MapGeneratorEditor : Editor {

    public override void OnInspectorGUI() {
        // reference to map generator
        MapGenerator mapGen = (MapGenerator)target; // target is the object this custom editor is inspecting

        // if any value was changed
        if (DrawDefaultInspector()) {
            if (mapGen.autoUpdate) {
                mapGen.GenerateMap();
            }
        }

        if (GUILayout.Button ("Generate")) {
            mapGen.GenerateMap();
        }

    }

}
