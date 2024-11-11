#!/bin/bash

# Define paths
SKETCH_DIR="$(dirname "$0")/storage/app/sketch"
BUILD_DIR="$SKETCH_DIR/build"

# Ensure the build directory exists and is empty
rm -rf "$BUILD_DIR"
mkdir -p "$BUILD_DIR"

# Run arduino-cli compile command
/usr/local/bin/arduino-cli compile -b arduino:avr:uno -e --output-dir "$BUILD_DIR" "$SKETCH_DIR" --config-file /home/ubuntu/.arduino15/arduino-cli.yaml 