import asyncio
from pyscript import document, fetch
import numpy as np
from math import degrees, radians

# --- Fetch and Execute Python Script ---

async def fetch_and_execute_python_file(url):
    """Fetches and executes a Python file from a given URL."""
    try:
        response = await fetch(url)
        if response.status != 200:
            raise Exception(f"Failed to fetch script: Status code {response.status}")
        text = await response.text()
        exec(text, globals())  # Executes script in global namespace
        print("External script executed successfully.")
    except Exception as e:
        document.querySelector("#result").innerText = f"Error: {str(e)}"
        print(f"Failed to fetch or execute script: {str(e)}")


# --- Quaternion Processing ---

def normalize(quat_list):
    """Normalizes a quaternion."""
    norm = np.linalg.norm(quat_list)
    return [q / norm for q in quat_list]

def process_quaternion(quat_list):
    """Processes quaternion input without displaying results but catches errors."""
    if 'Quat' not in globals():
        raise Exception("Quat class is not defined. Ensure the script was fetched and executed.")

    if len(quat_list) != 4:
        raise ValueError("Invalid input. Please enter exactly 4 quaternion values.")

    quat_list = normalize(quat_list)
    quat = Quat(quat_list)  # Use Quat class from fetched script

    # Update Euler form inputs
    document.querySelector("#eul-1").value = quat.ra
    document.querySelector("#eul-2").value = quat.dec
    document.querySelector("#eul-3").value = quat.roll


def process_euler(ra, dec, ncp):
    """Converts RA, Dec, NCP to quaternion components without displaying results but catches errors."""
    if 'Quat' not in globals():
        raise Exception("Quat class is not defined. Ensure the script was fetched and executed.")

    quat = Quat([float(ra), float(dec), float(ncp)])

    # Retrieve quaternion components
    q = quat.q

    # Update Quaternion form inputs
    document.querySelector("#quat-1").value = q[0]
    document.querySelector("#quat-2").value = q[1]
    document.querySelector("#quat-3").value = q[2]
    document.querySelector("#quat-4").value = q[3]


# --- Event Handlers ---

def compute_quat(event):
    """Triggered on button click to compute quaternion result. Only displays errors."""
    try:
        q1 = float(document.querySelector("#quat-1").value)
        q2 = float(document.querySelector("#quat-2").value)
        q3 = float(document.querySelector("#quat-3").value)
        q4 = float(document.querySelector("#quat-4").value)

        process_quaternion([q1, q2, q3, q4])
        document.querySelector("#result").innerText = ""  # Clear any previous errors
    except ValueError:
        document.querySelector("#result").innerText = "Invalid input. Please enter numeric values for quaternion components."
    except Exception as e:
        document.querySelector("#result").innerText = f"Error: {str(e)}"


def compute_euler(event):
    """Triggered on button click to compute Euler result. Only displays errors."""
    try:
        ra = float(document.querySelector("#eul-1").value)
        dec = float(document.querySelector("#eul-2").value)
        ncp = float(document.querySelector("#eul-3").value)

        process_euler(ra, dec, ncp)
        document.querySelector("#result").innerText = ""  # Clear any previous errors
    except ValueError:
        document.querySelector("#result").innerText = "Invalid input. Please enter numeric values for RA, Dec, and NCP."
    except Exception as e:
        document.querySelector("#result").innerText = f"Error: {str(e)}"


# --- Main Execution ---

async def main():
    url = "https://raw.githubusercontent.com/umer936/Quaternion/3648324d789aa39ae5b4d284295ab75092be9689/Quaternion/Quaternion.py"
    await fetch_and_execute_python_file(url)

# Ensure main is executed at the beginning
asyncio.ensure_future(main())
